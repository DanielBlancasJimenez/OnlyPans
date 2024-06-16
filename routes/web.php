 <?php

// use App\Http\Controllers\ProfileController;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\RecetaController;


// Route::get('/dashboard', [RecetaController::class, 'index']);



 



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php'; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\NoticiaController;

Route::get('/', [NoticiaController::class, 'index']);

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class,'__invoke')->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class,'__invoke')->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');

    // Renombrar la ruta conflictiva
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm.custom');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store'])->name('password.confirm.store.custom');

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// Ruta para el dashboard

Route::get('/dashboard', [RecetaController::class, 'index'])->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/mis-recetas', [RecetaController::class, 'misRecetas'])->name('recipes.index');
    Route::get('/mis-recetas/create', [RecetaController::class, 'create'])->name('recipes.create');
    Route::post('/mis-recetas', [RecetaController::class, 'store'])->name('recipes.store');
    Route::get('/mis-recetas/{receta}/edit', [RecetaController::class, 'edit'])->name('recipes.edit');
    Route::put('/mis-recetas/{receta}', [RecetaController::class, 'update'])->name('recipes.update');
    Route::delete('/mis-recetas/{receta}', [RecetaController::class, 'destroy'])->name('recipes.destroy');
   
});

Route::get('/welcome', [NoticiaController::class, 'index'])->name('welcome');

Route::get('/about', function () {
    return view('about');
})->name('about');

