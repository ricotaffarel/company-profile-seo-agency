<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\PortofolioCategoryController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MyTeamController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectGalleryController;
use App\Http\Controllers\ServiceTestimonyController;
use App\Http\Controllers\SlidderServiceController;
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

//  jika user belum login
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login-administrator', [AuthController::class, 'login'])->name('login');
    Route::post('/login-administrator', [AuthController::class, 'dologin']);
    Route::get('/', function () {
        return view('landing_page');
    });
});

// untuk superadmin dan admin
Route::group(['middleware' => ['auth', 'checkrole:rico@gmail.com']], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/changePassword', [AuthController::class, 'changePassword'])->name('changePassword');
    Route::get('/redirect', [RedirectController::class, 'check']);
    Route::resource('administrator/slider', SliderController::class)->names('administrator.slider');
    Route::resource('administrator/slider-service', SlidderServiceController::class)->names('administrator.slider-service');
    Route::resource('administrator/blog', BlogController::class)->names('administrator.blog');
    Route::resource('administrator/mitra', MitraController::class)->names('administrator.mitra');
    Route::resource('administrator/service-category', ServiceCategoryController::class)->names('administrator.service-category');
    Route::resource('administrator/service', ServiceController::class)->names('administrator.service');
    Route::resource('administrator/blog-category', BlogCategoryController::class)->names('administrator.blog-category');
    Route::resource('administrator/portofolio-category', PortofolioCategoryController::class)->names('administrator.portofolio-category');
    Route::resource('administrator/portofolio', PortofolioController::class)->names('administrator.portofolio');
    Route::resource('administrator/myteam', MyTeamController::class)->names('administrator.myteam');
    Route::resource('administrator/menu', MenuController::class)->names('administrator.menu');
    Route::get('administrator/dashboard', [MenuController::class, 'dashboard'])->name('administrator.dashboard');
    Route::resource('administrator/about', AboutController::class)->names('administrator.about');
    Route::resource('administrator/profile', ProfileController::class)->names('administrator.profile');
    Route::resource('administrator/project-gallery', ProjectGalleryController::class)->names('administrator.project-gallery');
    Route::resource('administrator/service-testimony', ServiceTestimonyController::class)->names('administrator.service-testimony');
});
