<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/login', function () {
    return view('admin.auth.login');
})->name('login');
Route::post('/admin/login', [\App\Http\Controllers\admin\auth\LoginController::class, 'login'])->name('auth.login');
Route::middleware(['auth'])->group(function () {
    Route::group(['middleware' => 'checkAdmin:1'], function () {
        Route::get('/admin/', function () {
            return view('admin.dashboard');
        });
        Route::get('/admin/home', [\App\Http\Controllers\admin\HomeController::class, 'index'])->name('home');
        Route::get('/admin/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('auth.logout');
    });
});