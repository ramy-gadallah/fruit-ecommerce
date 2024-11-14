<?php

use App\Http\Controllers\web\AboutController;
use App\Http\Controllers\web\CartController;
use App\Http\Controllers\web\CheckoutController;
use App\Http\Controllers\web\ContactController;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\Web\MainController;
use App\Http\Controllers\web\NewsController;
use App\Http\Controllers\web\ShopController;
use App\Http\Controllers\web\SingleNewController;
use App\Http\Controllers\web\SinglproductController;
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

            Route::get('/', [MainController::class, 'index'])->name('main.index');
            Route::get('home', [HomeController::class, 'index'])->name('web.home.index');
            Route::get('about', [AboutController::class, 'index'])->name('web.about.index');
            Route::get('cart', [CartController::class, 'index'])->name('web.cart.index');
            Route::get('checkout', [CheckoutController::class, 'index'])->name('web.checkout.index');
            Route::get('contact', [ContactController::class, 'index'])->name('web.contact.index');
            Route::get('news', [NewsController::class, 'index'])->name('web.news.index');
            Route::get('shop', [ShopController::class, 'index'])->name('web.shop.index');
            Route::get('single-product', [SinglproductController::class, 'index'])->name('web.single_product.index');
            Route::get('single_news', [SingleNewController::class, 'index'])->name('web.single_news.index');

        });

        // login

});
