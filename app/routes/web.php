<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuestbookController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/guestbook', [GuestbookController::class, 'index'])->name('guestbook');
Route::post('/guestbook', [GuestbookController::class, 'store'])->name('guestbook.store');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::get('/logout', [LogoutController::class, 'index'])->name('logout');