<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\web\BookingController;
use \App\Http\Controllers\web\auth\LoginController;

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
/*web*/
Route::get('/', [\App\Http\Controllers\web\HomeController::class, 'index', 'https'])->name('home');
Route::get('/single/{id}', [\App\Http\Controllers\web\SingleController::class, 'index'])->name('single');
Route::get('/tour', [\App\Http\Controllers\web\TourController::class, 'index']);
Route::resource('/booking', BookingController::class)->only(['update']);;
Route::get('/checkout', [\App\Http\Controllers\web\CheckoutController::class, 'index'])->name('checkout');
Route::post('/payment', [\App\Http\Controllers\web\CheckoutController::class, 'paymentPost']);
Route::get('/payment', [\App\Http\Controllers\web\CheckoutController::class, 'payment'])->name('payment');
Route::post('/comment/{id}', [\App\Http\Controllers\web\RatingCommentController::class, 'comment']);
Route::post('/loadmore', [\App\Http\Controllers\web\LoadMoreController::class, 'review']);
Route::resource('/search', \App\Http\Controllers\web\SearchController::class)->only(['store']);;
Route::resource('/profile', \App\Http\Controllers\web\ProfileController::class)->only(['index', 'update']);;
Route::get('/review', [\App\Http\Controllers\web\YouReviewController::class, 'index']);
Route::get('/news', [\App\Http\Controllers\web\NewsController::class, 'index']);
Route::get('/detail/{id}', [\App\Http\Controllers\web\NewsController::class, 'show']);


Route::get('/redirect/{provider}', [LoginController::class, 'redirect']);
Route::get('/callback/{provider}', [LoginController::class, 'callback']);
Route::get('/login', [LoginController::class, 'index'])->name('loginUser');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::resource('/register', \App\Http\Controllers\web\RegisterController::class)->only(['index', 'create']);;

Route::get('/language/{lang}', [\App\Http\Controllers\LanguageController::class, 'changeLanguage']);
/*admin*/
Route::get('/admin/login', [\App\Http\Controllers\admin\auth\LoginController::class, 'index'])->name('loginAdmin');
Route::post('/admin/login', [\App\Http\Controllers\admin\auth\LoginController::class, 'login'])->name('auth.login');
Route::middleware(['auth'])->group(function () {
    Route::group(['middleware' => 'checkAdmin:1'], function () {
        Route::get('/admin/', [\App\Http\Controllers\admin\HomeController::class, 'index'])->name('admin.home')->only(['index']);
        Route::get('admin/chart', [\App\Http\Controllers\admin\ChartController::class, 'chartBar']);
        Route::post('/admin/filterDate', [\App\Http\Controllers\admin\ChartController::class,'filterDate']);
        Route::post('/admin/filterBy', [\App\Http\Controllers\admin\ChartController::class, 'ChartService']);
        Route::get('/admin/logout', [\App\Http\Controllers\admin\Auth\LoginController::class, 'logout'])->name('auth.logout');
        Route::resource('/admin/user',\App\Http\Controllers\admin\UserController::class)->only(['index', 'create', 'store', 'show', 'update']);
        Route::resource('/admin/tour',\App\Http\Controllers\admin\TourController::class)->only(['index', 'create', 'store', 'show', 'update']);;
        Route::resource('/admin/booking',  \App\Http\Controllers\admin\ManagerBookingController::class)->only(['index', 'show', 'update']);;
        Route::resource('/admin/comment',  \App\Http\Controllers\admin\ManagerCommentController::class)->only(['index', 'show']);;
        Route::resource('/admin/category',  \App\Http\Controllers\admin\ManagerCategoryController::class)->only(['index', 'create', 'store', 'show', 'update']);;
        Route::resource('/admin/news',  \App\Http\Controllers\admin\NewsController::class)->only(['index', 'create', 'store', 'show', 'update']);;
    });
});


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
