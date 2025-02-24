<?php

use App\Http\Controllers\UrunlerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\HomeController;
use App\Http\Controllers\backend\SettingsController;
use App\Http\Controllers\backend\CategoriesController;
use App\Http\Controllers\backend\TypesController;
use App\Http\Controllers\backend\PagesController;
use App\Http\Controllers\backend\SlidersController;
use App\Http\Controllers\backend\BannersController;
use App\Http\Controllers\backend\ProductsController;
use App\Http\Controllers\backend\UsersController;
use App\Http\Controllers\frontend\DefaultController;
use App\Http\Controllers\frontend\RegisterController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\ProductController;
use App\Http\Controllers\frontend\CheckoutControlller;
use App\Http\Controllers\frontend\OrderController;
use App\Http\Controllers\frontend\AccountController;
Route::prefix('letmin')->group(function (){
    Route::get('/login',[HomeController::class,'login'])->name('login');
    Route::get('/logout',[HomeController::class,'logout'])->name('backend.logout');
    Route::post('/login',[HomeController::class,'authenticate'])->name('backend.authenticate');
});


Route::get('/letmin',[HomeController::class,'index'])->name('backend.home')->middleware(['auth', 'admin']);
Route::middleware(['auth','admin'])->group(function(){
Route::prefix('letmin/ayarlar')->group(function(){
    Route::get('/',[SettingsController::class,'index'])->name('settings.index');
    Route::post('sortable',[SettingsController::class,'sortable'])->name('settings.sortable');
    Route::get('delete/{id}',[SettingsController::class,'delete']);
    Route::get('edit/{id}',[SettingsController::class,'edit'])->name('settings.edit');
    Route::post('update/{id}',[SettingsController::class,'update'])->name('settings.update');
   });
Route::prefix('letmin/siparisler')->group(function(){
Route::get('/',[OrderController::class,'index'])->name('order.index');
Route::get('/detay/{order_code}',[OrderController::class,'detail'])->name('order.detail');
Route::put('/order-status',[OrderController::class,'status'])->name('order.status');
       });
});
Route::middleware(['auth','admin'])->group(function(){
Route::prefix('letmin')->group(function(){
    Route::resource('categories', CategoriesController::class);
    Route::post('categories/sortable',[CategoriesController::class,'sortable'])->name('categories.sortable');
    Route::post('categories/switch/{id}', [CategoriesController::class, 'switch']);

    Route::resource('types',TypesController::class);
    Route::post('types/sortable',[TypesController::class,'sortable'])->name('types.sortable');
    Route::post('types/switch/{id}', [TypesController::class, 'switch']);

    Route::resource('products',ProductsController::class);
    Route::post('products/sortable',[ProductsController::class,'sortable'])->name('products.sortable');
    Route::post('products/switch/{id}', [ProductsController::class, 'switch']);

    Route::resource('sliders',SlidersController::class);
    Route::post('sliders/sortable',[SlidersController::class,'sortable'])->name('sliders.sortable');
    Route::post('sliders/switch/{id}', [SlidersController::class, 'switch']);

    Route::resource('banners',BannersController::class);
    Route::post('banners/sortable',[BannersController::class,'sortable'])->name('banners.sortable');
    Route::post('banners/switch/{id}', [BannersController::class, 'switch']);

    Route::resource('pages',PagesController::class);
    Route::post('pages/sortable',[PagesController::class,'sortable'])->name('pages.sortable');
    Route::post('pages/switch/{id}', [PagesController::class, 'switch']);

    Route::resource('users',UsersController::class);
    Route::post('users/sortable',[UsersController::class,'sortable'])->name('users.sortable');
    Route::post('users/switch/{id}', [UsersController::class, 'switch']);
});
});

Route::get('/',[DefaultController::class,'index'])->name('frontend.home');
Route::get('/kurumsal/{slug}',[DefaultController::class,'page'])->name('frontend.page');
Route::get('/iletisim',[DefaultController::class,'contact'])->name('frontend.contact');
Route::post('/gonderildi',[DefaultController::class,'send'])->name('frontend.send');
Route::get('/kayit-ol',[DefaultController::class,'register'])->name('frontend.register');
Route::post('/register',[DefaultController::class,'registerStore'])->name('frontend.registerStore');
Route::post('/singed',[DefaultController::class,'singed'])->name('frontend.singed');
Route::get('/sisteme-giris-yap',[DefaultController::class,'login'])->name('frontend.enter');
Route::get('/sifremi-unuttum',[DefaultController::class,'forget'])->name('frontend.forget');
Route::get('/cikis',[AccountController::class,'logout'])->name('frontend.logout');
Route::post('/registers/login', [RegisterController::class, 'login'])->name('frontend.login');
Route::post('/registers/logout', [RegisterController::class, 'logout']);
Route::get('/urunler/{slug}', [ProductController::class, 'index'])->name('frontend.products');
Route::get('/kategori/{slug}', [ProductController::class, 'category'])->name('frontend.categories');
Route::get('/urunler/detay/{slug}', [ProductController::class, 'detail'])->name('product.detail');
Route::get('/arama', [ProductController::class, 'search'])->name('frontend.search');
Route::get('ara', [ProductController::class, 'ara'])->name('ara');
Route::post('/autocomplete/fetch', [ProductController::class, 'fetch'])->name('autocomplete.fetch');
Route::post('/add-to-cart',[CartController::class,'addtocart'])->name('addtocart');
Route::post('update-to-cart',[CartController::class,'updatetocart'])->name('updatetocart');
Route::get('/cart',[CartController::class,'cart'])->name('cart');
Route::get('/odeme-islemleri',[CheckoutControlller::class,'index'])->name('checkout');
Route::get('/load-cart-data',[CartController::class,'cartloadbyajax']);
Route::delete('/delete-from-cart',[CartController::class,'deletefromcart']);
Route::get('/hesabim',[RegisterController::class,'index'])->name('frontend.account');
Route::get('/whatsapp',[DefaultController::class,'whatsapp'])->name('whatsapp.send');
Route::post('/siparis-kayit',[CheckoutControlller::class,'saveOrder'])->name('order.register');
Route::post('/siparis-urun-kayit',[OrderController::class,'create'])->name('order.products');
Route::get('/islem-basarili',[CheckoutControlller::class,'success'])->name('order.success');
Route::get('/urun/kategori/{slug}', [ProductController::class, 'categories'])->name('frontend.types');



