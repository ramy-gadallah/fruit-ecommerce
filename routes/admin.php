<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BreadCrambController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DealController;
use App\Http\Controllers\Admin\HomeAboutController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\admin\NewController as AdminNewController;
use App\Http\Controllers\Admin\NewLetterController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\web\NewController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::group(['prefix' => 'admin'], function () {
            Route::get('login', [AuthController::class, 'index'])->name('admin.login');
            Route::POST('login', [AuthController::class, 'login'])->name('admin.login');

            Route::group(['middleware' => 'auth:admin'], function () {
                Route::get('/', function () {
                    return view('admin/index');
                })->name('adminHome');
                #============================ Admin ====================================
                Route::resource('admins', AdminController::class);
                Route::get('my_profile', [AdminController::class, 'myProfile'])->name('myProfile');
                Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');
                #============================ Setting ==================================
                Route::get('setting', [SettingController::class, 'index'])->name('settingIndex');
                Route::POST('setting/update/{id}', [SettingController::class, 'update'])->name('settingUpdate');
                #============================ User ==================================
                Route::resource('users', UserController::class);
                Route::post('changeUserStatus', [UserController::class, 'changeStatus'])->name('changeUserStatus');
                #============================ User ==================================
                Route::resource('reviews', ReviewController::class);
                #============================ User =================================
                Route::get('home/about', [HomeAboutController::class, 'index'])->name('admin.aboutHome.index');
                Route::any('home_about/update/{id}', [HomeAboutController::class, 'update'])->name('home_aboutUpdate');
                #============================ category =================================
                Route::resource('category', CategoryController::class);
                Route::post('change/category/status', [CategoryController::class, 'changeStatus'])->name('changeCategoryStatus');
                #============================ unit =================================
                Route::resource('unit',UnitController::class);
                #============================ unit =================================
                Route::resource('product',ProductController::class);
                #============================ unit =================================
                Route::resource('units',UnitController::class);
                Route::post('changeUnitStatus', [UnitController::class, 'changeStatus'])->name('changeUnitStatus');
                #============================ products =================================
                Route::resource('product',ProductController::class);
                Route::post('changeProductStatus', [ProductController::class, 'changeStatus'])->name('changeProductStatus');
                #============================ slider =================================
                Route::get('slider', [SliderController::class, 'index'])->name('admin.slider.index');
                Route::any('sliderUpdate/{id}', [SliderController::class, 'update'])->name('admin.slider.update');
                #============================ Deals =================================
                Route::get('deals', [DealController::class, 'index'])->name('deals.index');
                Route::any('deals/update/{id}', [DealController::class, 'update'])->name('deals.update');
                #============================ Jobs =================================
                Route::resource('jobs', JobController::class);
                Route::post('changeJobStatus',[JobController::class, 'changeStatus'])->name('changeJobStatus');
                #============================ team =================================
                Route::resource('team', TeamController::class);
                #============================ partners =================================
                Route::resource('partners',PartnerController::class);
                Route::post('changepartnerStatus',[PartnerController::class, 'changeStatus'])->name('changepartnerStatus');
                #============================ partners =================================
               Route::resource('blogs', BlogController::class);
                #============================ contact =================================
                Route::resource('contact_us',ContactController::class);
                #============================ breadcrumb =================================
                Route::resource('breadcrumb',BreadCrambController::class);
                Route::post('changebreadcrumbStatus',[BreadCrambController::class, 'changeStatus'])->name('changebreadcrumbStatus');
                #============================ coupon =================================
                Route::resource('coupon',CouponController::class);
                Route::post('changecouponStatus',[CouponController::class, 'changeStatus'])->name('changecouponStatus');




            });
        });

        #=======================================================================
        #============================ ROOT =====================================
        #=======================================================================
        Route::get('/clear', function () {
            Artisan::call('cache:clear');
            Artisan::call('key:generate');
            Artisan::call('config:clear');
            Artisan::call('optimize:clear');
            return response()->json(['status' => 'success', 'code' => 1000000000]);
        });
    }
);
