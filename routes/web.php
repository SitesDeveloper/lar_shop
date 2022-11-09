<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', \App\Http\Controllers\Main\IndexController::class)->name('main.index');

Route::group(['prefix'=>'categories'],function(){
    Route::get('/', \App\Http\Controllers\Category\IndexController::class)->name('category.index');
    Route::get('/create', \App\Http\Controllers\Category\CreateController::class)->name('category.create');
    Route::post('/store', \App\Http\Controllers\Category\StoreController::class)->name('category.store');
    Route::get('/{category}/show', \App\Http\Controllers\Category\ShowController::class)->name('category.show');
    Route::get('/{category}/edit', \App\Http\Controllers\Category\EditController::class)->name('category.edit');
    Route::patch('/{category}/update', \App\Http\Controllers\Category\UpdateController::class)->name('category.update');
    Route::delete('/{category}/delete', \App\Http\Controllers\Category\DeleteController::class)->name('category.destroy');
});

Route::group(['prefix'=>'tags'],function(){
    Route::get('/', \App\Http\Controllers\Tag\IndexController::class)->name('tag.index');
    Route::get('/create', \App\Http\Controllers\Tag\CreateController::class)->name('tag.create');
    Route::post('/store', \App\Http\Controllers\Tag\StoreController::class)->name('tag.store');
    Route::get('/{tag}/show', \App\Http\Controllers\Tag\ShowController::class)->name('tag.show');
    Route::get('/{tag}/edit', \App\Http\Controllers\Tag\EditController::class)->name('tag.edit');
    Route::patch('/{tag}/update', \App\Http\Controllers\Tag\UpdateController::class)->name('tag.update');
    Route::delete('/{tag}/delete', \App\Http\Controllers\Tag\DeleteController::class)->name('tag.destroy');
});

Route::group(['prefix'=>'colors'],function(){
    Route::get('/', \App\Http\Controllers\Color\IndexController::class)->name('color.index');
    Route::get('/create', \App\Http\Controllers\Color\CreateController::class)->name('color.create');
    Route::post('/store', \App\Http\Controllers\Color\StoreController::class)->name('color.store');
    Route::get('/{color}/show', \App\Http\Controllers\Color\ShowController::class)->name('color.show');
    Route::get('/{color}/edit', \App\Http\Controllers\Color\EditController::class)->name('color.edit');
    Route::patch('/{color}/update', \App\Http\Controllers\Color\UpdateController::class)->name('color.update');
    Route::delete('/{color}/delete', \App\Http\Controllers\Color\DeleteController::class)->name('color.destroy');
});
