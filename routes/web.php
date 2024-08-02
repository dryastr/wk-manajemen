<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\KaprogController;
use App\Http\Controllers\admin\manajemen\AddUsersController;
use App\Http\Controllers\admin\manajemen\JurusansController;
use App\Http\Controllers\admin\manajemen\RayonsController;
use App\Http\Controllers\admin\manajemen\RombelsController;
use App\Http\Controllers\admin\PemrayController;
use App\Http\Controllers\admin\SuperAdminController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\manajemen\ProfilesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();
        switch ($user->role->name) {
            case 'super_admin':
                return redirect()->route('super_admin.dashboard');
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'kaprog':
                return redirect()->route('kaprog.dashboard');
            case 'pemray':
                return redirect()->route('pemray.dashboard');
            default:
                return redirect()->route('home');
        }
    }
    return redirect()->route('login');
})->name('home');

// Route::get('/register', function () {
//     return redirect()->route('login');
// });

Auth::routes(['register' => false]);

// Auth::routes(['middleware' => ['redirectIfAuthenticated']]);

Route::middleware(['auth', 'role.super_admin'])->group(function () {
    Route::get('/super_admin', [SuperAdminController::class, 'index'])->name('super_admin.dashboard');
    Route::resource('rayons', RayonsController::class);
    Route::resource('jurusans', JurusansController::class);
    Route::resource('addusers', AddUsersController::class);
    Route::resource('rombels', RombelsController::class);
});

Route::middleware(['auth', 'role.admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/admin/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
});

Route::middleware(['auth', 'role.kaprog'])->group(function () {
    Route::get('/kaprog', [KaprogController::class, 'index'])->name('kaprog.dashboard');
});

Route::middleware(['auth', 'role.pemray'])->group(function () {
    Route::get('/pemray', [PemrayController::class, 'index'])->name('pemray.dashboard');
});

Route::middleware(['auth', 'role.user'])->group(function () {
    Route::get('/home', [UserController::class, 'index'])->name('home');
    Route::get('profiles/{id}', [ProfilesController::class, 'show'])->name('profiles.show');
    Route::get('profiles/{id}/edit', [ProfilesController::class, 'edit'])->name('profiles.edit');
    Route::put('profiles/{id}', [ProfilesController::class, 'update'])->name('profiles.update');
});
