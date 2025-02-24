<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemorialController;
use App\Http\Controllers\QrCodeController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use App\Models\QrCodes;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/price', function () {
    return view('price');
})->name('price');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/run-seed', function () {
    Artisan::call('db:seed');
    return back()->with('success', 'Add 10 qr code!');
})->name('run.seed');


Route::get('/memorials', [MemorialController::class, 'codelist'])->name('memorial.codelist');

Route::post('/images/store', [ImageController::class, 'store'])->name('image.store');

Route::post('/images/upload-temp', [ImageController::class, 'uploadTempImage'])->name('image.uploadTempImage');

Route::get('/memorial/attach/{token}', [QrCodeController::class, 'showAttachForm'])->name('memorial.attach.form');

Route::get('/memorial/{memorial}', [MemorialController::class, 'show'])->name('memorial.show');


Route::middleware(['auth'])->group(function () {
    Route::post('/memorial/attach', [QrCodeController::class, 'attach'])->name('memorial.attach');
    Route::post('/memorial/save', [MemorialController::class, 'saveMemorial'])->name('memorial.save');

    Route::get('/dashboard/memorial/images', [MemorialController::class, 'images'])->name('memorial.images');

    // Редактирование информации
    Route::get('/dashboard/memorial/{id}/edit', [MemorialController::class, 'edit'])->name('memorial.edit');
    Route::put('/dashboard/memorial/{id}', [MemorialController::class, 'update'])->name('memorial.update');
    Route::delete('/dashboard/memorials/{memorial}', [MemorialController::class, 'destroy'])->name('memorial.destroy');

    // Редактирование изображений
    Route::get('/dashboard/memorial/{id}/images', [MemorialController::class, 'editImages'])->name('memorial.images.edit');
    Route::post('/dashboard/memorial/{id}/images', [MemorialController::class, 'uploadImages'])->name('memorial.images.upload');
    Route::delete('/dashboard/memorial/image/{id}', [MemorialController::class, 'deleteImage'])->name('memorial.image.delete');

    Route::post('/dashboard/memorial/{id}/images/update', [MemorialController::class, 'updateImages'])->name('memorials.images.update');

    Route::post('/memorial/{slug}/comments', [CommentController::class, 'store'])->name('comments.store');

    Route::patch('/comments/{comment}/approve', [CommentController::class, 'approve'])->name('comments.approve');
    Route::patch('/comments/{comment}/reject', [CommentController::class, 'reject'])->name('comments.reject');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    Route::get('/dashboard/memorial/{id}/comments', [CommentController::class, 'comments'])->name('memorial.comments');

    Route::get('/memorials/{memorial}/comments', [CommentController::class, 'index'])->name('comments.index');

    Route::get('/memorial/{slug}/comments/create', [CommentController::class, 'create'])->name('comments.create');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
});

require __DIR__.'/auth.php';

Route::get('/auth/google/redirect', function (Request $request) {
    return Socialite::driver('google')->redirect();
})->name('google.login');
 
Route::get('/auth/google/callback', [ProfileController::class, 'handleGoogleCallback'])->name('google.callback');




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
            $filePath = storage_path("app/public/qrcodes/" . basename($memorial->qr_code));
            if (file_exists($filePath)) {
                $zip->addFile($filePath, basename($memorial->qr_code));
            }
        }
        $zip->close();
    }

    // Обновляем статус файлов
    QrCodes::whereIn('id', $request->ids)->update(['status' => 'downloaded']);

    // Сохраняем информацию о файле для скачивания в сессии
    session(['download_file' => $zipFileName]);

    return redirect()->route('memorial.showall')
        ->with('success', 'qr code download')
        ->with('download_url', asset("storage/{$zipFileName}"));
})->name('download.bulk');