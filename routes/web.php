<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\HomeController;
use App\Http\Controllers\backend\SettingsController;
use App\Http\Controllers\backend\CategoriesController;
Route::prefix('letmin')->group(function(){
    Route::get('ayarlar',[SettingsController::class,'index'])->name('settings.index');
    Route::get('/',[HomeController::class,'index'])->name('backend.home');
    Route::post('sortable',[SettingsController::class,'sortable'])->name('settings.sortable');
    Route::get('ayarlar/delete/{id}',[SettingsController::class,'delete']);
    Route::get('ayarlar/edit/{id}',[SettingsController::class,'edit'])->name('settings.edit');
    Route::post('ayarlar/update/{id}',[SettingsController::class,'update'])->name('settings.update');
});

Route::prefix('letmin')->group(function(){
Route::resource('categories',[CategoriesController::class]);
});
