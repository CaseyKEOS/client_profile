<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\UserController;
use Illuminate\Auth\AuthManager as AuthAuthManager;
use Illuminate\Support\Facades\DB;

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
    return view('home');
})->name('home')->middleware('auth');

Route::get('/login', [AuthManager::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/user', function () {
    return view('user');
});

Route::get('/profile', function () {
    return view('profile');
});

// Route::get('users', [AuthManager::class,'home']);
// Route::get('/', [AuthManager::class, 'home'])->middleware('auth');



Route::get('/user', [UserController::class, 'user'])->name('user');
Route::post('/registration', [UserController::class, 'registrationPost'])->name('registration.post');

Route::get('/logout',[AuthManager::class, 'logout'])->name('logout');

Route::get('/user', function () {
    $users = DB::table('users')->select('id','username','email')->get();
    return view('user', compact('users'));
});
