<?php

use App\Http\Controllers\Admin\NewLetterController;
use App\Http\Controllers\web\AboutController;
use App\Http\Controllers\web\CartController;
use App\Http\Controllers\web\CheckoutController;
use App\Http\Controllers\web\ContactController;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\Web\MainController;
use App\Http\Controllers\web\NewController;
use App\Http\Controllers\web\ShopController;
use App\Http\Controllers\web\SingleNewController;
use App\Http\Controllers\web\SinglproductController;
use App\Http\Controllers\web\TeamController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {
        Route::group(['prefix'=>'web'], function () {

        #============================ main =================================
            route::get('register', [MainController::class, 'register'])->name('web.register');
            Route::post('doRegister', [MainController::class, 'doRegister'])->name('web.doRegister');
            Route::get('login', [MainController::class, 'login'])->name('web.login');
            Route::post('doLogin', [MainController::class, 'doLogin'])->name('web.doLogin');
            Route::get('logout', [MainController::class, 'logout'])->name('web.logout');
        #============================ Home =================================
            Route::get('home', [HomeController::class, 'index'])->name('web.home.index');
        #============================ About =================================
            Route::get('about', [AboutController::class, 'index'])->name('web.about.index');
        #============================ Cart =================================
        Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('web.cart.addToCart')->middleware('auth:web');
            Route::get('cart}', [CartController::class, 'index'])->name('web.cart.index')->middleware('auth:web');
        #============================ Checkout =================================
            Route::get('checkout', [CheckoutController::class, 'index'])->name('web.checkout.index');
         #============================ Contact =================================
            Route::get('contact', [ContactController::class, 'index'])->name('web.contact.index');
         #============================ blog =================================
            Route::get('news', [NewController::class, 'index'])->name('web.news.index');
         #============================ Team =================================
            Route::get('team', [TeamController::class, 'index'])->name('web.team.index');
        #============================ shop =================================
            Route::get('shop', [ShopController::class, 'index'])->name('web.shop.index');
         #============================ single_product =================================
            Route::get('single-product/{id}', [SinglproductController::class, 'index'])->name('web.single_product.index');
         #============================ single_news =================================
            Route::get('single_news/{id}', [SingleNewController::class, 'index'])->name('web.single_news.index');
         #============================ newLetter =================================
            Route::resource('newLetter',NewLetterController::class);
         #============================ contact =================================
            Route::resource('web_contact_us',ContactController::class);
        });

        // login

});
