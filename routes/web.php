<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\MemorialController;
use App\Http\Controllers\QrCodeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




// Route::get('/memorial/{id}', [MemorialController::class, 'show']);
// Route::get('/memorial/attach/{token}', [QrCodeController::class, 'showAttachForm']);
// Route::post('/memorial/attach', [QrCodeController::class, 'attach']);

Route::get('/memorials', [MemorialController::class, 'showall'])->name('memorial.showall');

Route::get('/memorial/{id}', [MemorialController::class, 'show'])->name('memorial.show');

Route::get('/memorial/attach/{token}', [QrCodeController::class, 'showAttachForm'])->name('memorial.attach.form');
Route::post('/memorial/attach', [QrCodeController::class, 'attach'])->name('memorial.attach');


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
