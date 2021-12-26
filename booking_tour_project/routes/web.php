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
Route::get('/tour', [\App\Http\Controllers\web\TourController::class, 'index'])->name('tours');
Route::post('/booking/{id}', [BookingController::class, 'addCart']);
Route::get('/booking', [BookingController::class, 'createBooking']);
Route::get('/checkout', [\App\Http\Controllers\web\CheckoutController::class, 'index'])->name('checkout');
Route::post('/payment', [\App\Http\Controllers\web\CheckoutController::class, 'paymentPost']);
Route::get('/payment', [\App\Http\Controllers\web\CheckoutController::class, 'payment'])->name('payment');
Route::post('/comment/{id}', [\App\Http\Controllers\web\RatingCommentController::class, 'comment']);
Route::post('/loadmore', [\App\Http\Controllers\web\LoadMoreController::class, 'review']);
Route::resource('/profile', \App\Http\Controllers\web\ProfileController::class)->only(['index', 'update']);
Route::get('/review', [\App\Http\Controllers\web\YouReviewController::class, 'index'])->name('reviews');

Route::get('/your-booking', [\App\Http\Controllers\web\YouReviewController::class, 'yourBooking']);
Route::get('/your-booking/cancel/{id}', [\App\Http\Controllers\web\YouReviewController::class, 'yourBookingCancel']);

Route::get('/news', [\App\Http\Controllers\web\NewsController::class, 'index'])->name('news');
Route::get('/detail/{id}', [\App\Http\Controllers\web\NewsController::class, 'show']);

Route::post('/auto-complete', [\App\Http\Controllers\web\SearchController::class, 'autoComplete']);
Route::get('/search', [\App\Http\Controllers\web\SearchController::class, 'index']);

Route::get('/tag/{tag}',['App\Http\Controllers\web\TagsController', 'index']);

Route::get('/redirect/{provider}', [LoginController::class, 'redirect']);
Route::get('/callback/{provider}', [LoginController::class, 'callback']);
Route::get('/login', [LoginController::class, 'index'])->name('loginUser');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logoutUser');
Route::resource('/register', \App\Http\Controllers\web\RegisterController::class)->only(['index', 'create']);

Route::get('/language/{lang}', [\App\Http\Controllers\LanguageController::class, 'changeLanguage']);
/*admin*/
Route::get('/admin/login', [\App\Http\Controllers\admin\auth\LoginController::class, 'index'])->name('loginAdmin');
Route::post('/admin/login', [\App\Http\Controllers\admin\auth\LoginController::class, 'login'])->name('auth.login');
Route::post('/admin/logout', [\App\Http\Controllers\admin\auth\LoginController::class, 'logout'])->name('auth.logout');
Route::middleware(['auth'])->group(function () {
    Route::group(['middleware' => 'checkAdmin:1'], function () {
        Route::get('/admin/', [\App\Http\Controllers\admin\HomeController::class, 'index'])->name('admin.home');
        Route::get('admin/chart', [\App\Http\Controllers\admin\ChartController::class, 'chartBar']);
        Route::post('/admin/filterDate', [\App\Http\Controllers\admin\ChartController::class,'filterDate']);
        Route::post('/admin/filterBy', [\App\Http\Controllers\admin\ChartController::class, 'ChartService']);
        Route::get('/admin/logout', [\App\Http\Controllers\admin\Auth\LoginController::class, 'logout'])->name('auth.logout');
        Route::resource('/admin/user',\App\Http\Controllers\admin\UserController::class);
        Route::resource('/admin/tour',\App\Http\Controllers\admin\TourController::class);
        Route::resource('/admin/booking',  \App\Http\Controllers\admin\ManagerBookingController::class)->only(['index','show', 'update']);
        Route::resource('/admin/comment',  \App\Http\Controllers\admin\ManagerCommentController::class)->only(['index', 'show', 'update']);
        Route::resource('/admin/category',  \App\Http\Controllers\admin\ManagerCategoryController::class);
        Route::resource('/admin/news',  \App\Http\Controllers\admin\NewsController::class);
        Route::get('/admin/export-excel/{filter}', [\App\Http\Controllers\admin\HomeController::class, 'exportStatistic']);
    });
});


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
