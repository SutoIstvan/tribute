<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
// use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\MemorialController;
use App\Http\Controllers\QrCodeController;
use App\Models\Memorial;
use App\Models\QrCodes;
use Illuminate\Support\Facades\Artisan;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $admin_id = Auth::user()->id;

    $memorials = Memorial::with(['admin'])
        ->where('admin_id', $admin_id)
        ->get();
    return view('dashboard', compact('memorials'));
})->middleware(['auth', 'verified'])->name('dashboard');


Route::post('/run-seed', function () {
    Artisan::call('db:seed');
    return back()->with('success', 'Add 10 qr code!');
})->name('run.seed');


Route::get('/memorials', [MemorialController::class, 'showall'])->name('memorial.showall');


Route::post('/images/store', [ImageController::class, 'store'])->name('image.store');

Route::post('/images/upload-temp', [ImageController::class, 'uploadTempImage'])->name('image.uploadTempImage');


Route::get('/memorial/attach/{token}', [QrCodeController::class, 'showAttachForm'])->name('memorial.attach.form');


Route::get('/memorial/{id}', [MemorialController::class, 'show'])->name('memorial.show');



Route::middleware(['auth'])->group(function () {
    Route::post('/memorial/attach', [QrCodeController::class, 'attach'])->name('memorial.attach');
    Route::post('/memorial/save', [MemorialController::class, 'saveMemorial'])->name('memorial.save');

    Route::get('/dashboard/memorial/images', [MemorialController::class, 'images'])->name('memorial.images');


    // Редактирование информации
    Route::get('/dashboard/memorial/{id}/edit', [MemorialController::class, 'edit'])->name('memorial.edit');
    Route::put('/dashboard/memorial/{id}', [MemorialController::class, 'update'])->name('memorial.update');

    // Редактирование изображений
    Route::get('/dashboard/memorial/{id}/images', [MemorialController::class, 'editImages'])->name('memorial.images.edit');
    Route::post('/dashboard/memorial/{id}/images', [MemorialController::class, 'uploadImages'])->name('memorial.images.upload');
    Route::delete('/dashboard/memorial/image/{id}', [MemorialController::class, 'deleteImage'])->name('memorial.image.delete');

    
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::get('/auth/google/redirect', function (Request $request) {
    return Socialite::driver('google')->redirect();
})->name('google.login');
 
Route::get('/auth/google/callback', function (Request $request) {
    // dd($request);
    $user = Socialite::driver('google')->user();
 
    try {
        $googleUser = Socialite::driver('google')->user();

        $user = User::updateOrCreate(
            [
                'email' => $googleUser->getEmail(),
            ],
            [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
                'password' => bcrypt('google'),
                'email_verified_at' => now()
            ]
        );

        Auth::login($user);

        return redirect()->route('home');
    } catch (\Exception $e) {
        return redirect()->route('login')->withErrors(['error' => 'Failed to sign in with Google']);
    }
});


Route::post('/download/bulk', function (Request $request) {
    $memorials = QrCodes::whereIn('id', $request->ids)->get();

    if ($memorials->isEmpty()) {
        return back()->with('error', 'Файлы не найдены');
    }

    $zipFileName = 'qrcodes_' . time() . '.zip';
    $zipPath = storage_path("app/public/{$zipFileName}");
    $zip = new \ZipArchive;

    if ($zip->open($zipPath, ZipArchive::CREATE) === true) {
        foreach ($memorials as $memorial) {
            $filePath = storage_path("app/public/{$memorial->qr_code}");
            if (file_exists($filePath)) {
                $zip->addFile($filePath, basename($filePath));
            }
        }
        $zip->close();
    } else {
        return back()->with('error', 'Не удалось создать архив');
    }

    // Обновляем статус файлов
    QrCodes::whereIn('id', $request->ids)->update(['status' => 'downloaded']);

    return redirect()->route('memorial.showall')->with('success', 'qr code download'); // Замените 'your.route.name' на нужный маршрут

    // return Response::download($zipPath)->deleteFileAfterSend(true);
})->name('download.bulk');