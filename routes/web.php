<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\HomeController;
use App\Http\Controllers\backend\SettingsController;
use App\Http\Controllers\backend\CategoriesController;
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
    Route::post('sortable',[CategoriesController::class,'sortable'])->name('categories.sortable');
    });


