<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\HomeController;
use App\Http\Controllers\backend\SettingsController;
use App\Http\Controllers\backend\CategoriesController;
use App\Http\Controllers\backend\TypesController;
use App\Http\Controllers\backend\PagesController;
use App\Http\Controllers\backend\SlidersController;
use App\Http\Controllers\backend\ProductsController;
Route::get('/',[HomeController::class,'index'])->name('backend.home');
Route::prefix('letmin/ayarlar')->group(function(){
    Route::get('/',[SettingsController::class,'index'])->name('settings.index');
        Route::post('sortable',[SettingsController::class,'sortable'])->name('settings.sortable');
    Route::get('delete/{id}',[SettingsController::class,'delete']);
    Route::get('edit/{id}',[SettingsController::class,'edit'])->name('settings.edit');
    Route::post('update/{id}',[SettingsController::class,'update'])->name('settings.update');
   });
Route::prefix('letmin')->group(function(){
    Route::resource('categories', CategoriesController::class);
    Route::post('categories/sortable',[CategoriesController::class,'sortable'])->name('categories.sortable');
    Route::post('categories/switch/{id}', [CategoriesController::class, 'switch']);
    });
Route::prefix('letmin')->group(function(){
  Route::resource('types',TypesController::class);
  Route::post('types/sortable',[TypesController::class,'sortable'])->name('types.sortable');
    Route::post('types/switch/{id}', [TypesController::class, 'switch']);
});
Route::prefix('letmin')->group(function(){
    Route::resource('products',ProductsController::class);
    Route::post('products/sortable',[ProductsController::class,'sortable'])->name('products.sortable');
    Route::post('products/switch/{id}', [ProductsController::class, 'switch']);
});
Route::prefix('letmin')->group(function(){
    Route::resource('sliders',SlidersController::class);
    Route::post('sliders/sortable',[TypesController::class,'sortable'])->name('sliders.sortable');
});
Route::prefix('letmin')->group(function(){
    Route::resource('pages',PagesController::class);
    Route::post('pages/sortable',[PagesController::class,'sortable'])->name('pages.sortable');

});

