<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\postController;
use App\Http\Controllers\userController;
use App\Http\Controllers\MembersControllers;
use App\Http\Middleware\IsLoggedIn;
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

// Admin Part All Section 
// ====================================================================================
Route::get('/register', [LoginController::class, 'register']);
Route::get('/forgot-pass', [LoginController::class, 'forgotPass']);
Route::get('/reset-pass/{email}/{token}', [LoginController::class, 'resetPass'])->name('reset');

Route::post('/register', [LoginController::class, 'registerUser'])->name('admin.auth.register');
Route::post('/login', [LoginController::class, 'loginUser'])->name('admin.auth.login');
Route::post('/forgot-pass', [LoginController::class, 'forgotPassword'])->name('admin.auth.forgot');
Route::post('/reset-password', [LoginController::class, 'resetPassword'])->name('admin.auth.reset');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['IsLoggedIn'])->name('dashboard');
Route::group(['middleware' => ['IsLoggedIn']], function() {
    // login part --------------------
    Route::get('/', [LoginController::class, 'login']);
    Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');

    //members route and controllers
    Route::get('/members', [MembersControllers::class, 'index'])->name('members');
    Route::get('/add-members', [MembersControllers::class, 'create'])->name('add.members');
    Route::post('/add-members', [MembersControllers::class, 'store'])->name('add.members');
    Route::get('/edit-members/{id}', [MembersControllers::class, 'edit'])->name('edit.members');
    Route::post('/update-members', [MembersControllers::class, 'update'])->name('update.members');
    Route::get('/delete-members/{id}', [MembersControllers::class, 'delete'])->name('delete.members');

    Route::get('/profile', [LoginController::class, 'profile'])->name('profile');
    Route::post('/profile-image', [LoginController::class, 'profileImageUpdate'])->name('profile.image');
    Route::post('/profile-update', [LoginController::class, 'profileUpdate'])->name('profile.update');

    // Dashboard Part --------------------------------
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin');


});