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
Route::group(['prefix' => 'admin'], function () {

    Route::get('/', \App\Http\Controllers\Main\IndexController::class)->name('main.index');

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', \App\Http\Controllers\Category\IndexController::class)->name('category.index');
        Route::get('/create', \App\Http\Controllers\Category\CreateController::class)->name('category.create');
        Route::post('/store', \App\Http\Controllers\Category\StoreController::class)->name('category.store');
        Route::get('/{category}/show', \App\Http\Controllers\Category\ShowController::class)->name('category.show');
        Route::get('/{category}/edit', \App\Http\Controllers\Category\EditController::class)->name('category.edit');
        Route::patch('/{category}/update', \App\Http\Controllers\Category\UpdateController::class)->name('category.update');
        Route::delete('/{category}/delete', \App\Http\Controllers\Category\DeleteController::class)->name('category.destroy');
    });

    Route::group(['prefix' => 'tags'], function () {
        Route::get('/', \App\Http\Controllers\Tag\IndexController::class)->name('tag.index');
        Route::get('/create', \App\Http\Controllers\Tag\CreateController::class)->name('tag.create');
        Route::post('/store', \App\Http\Controllers\Tag\StoreController::class)->name('tag.store');
        Route::get('/{tag}/show', \App\Http\Controllers\Tag\ShowController::class)->name('tag.show');
        Route::get('/{tag}/edit', \App\Http\Controllers\Tag\EditController::class)->name('tag.edit');
        Route::patch('/{tag}/update', \App\Http\Controllers\Tag\UpdateController::class)->name('tag.update');
        Route::delete('/{tag}/delete', \App\Http\Controllers\Tag\DeleteController::class)->name('tag.destroy');
    });

    Route::group(['prefix' => 'colors'], function () {
        Route::get('/', \App\Http\Controllers\Color\IndexController::class)->name('color.index');
        Route::get('/create', \App\Http\Controllers\Color\CreateController::class)->name('color.create');
        Route::post('/store', \App\Http\Controllers\Color\StoreController::class)->name('color.store');
        Route::get('/{color}/show', \App\Http\Controllers\Color\ShowController::class)->name('color.show');
        Route::get('/{color}/edit', \App\Http\Controllers\Color\EditController::class)->name('color.edit');
        Route::patch('/{color}/update', \App\Http\Controllers\Color\UpdateController::class)->name('color.update');
        Route::delete('/{color}/delete', \App\Http\Controllers\Color\DeleteController::class)->name('color.destroy');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', \App\Http\Controllers\User\IndexController::class)->name('user.index');
        Route::get('/create', \App\Http\Controllers\User\CreateController::class)->name('user.create');
        Route::post('/store', \App\Http\Controllers\User\StoreController::class)->name('user.store');
        Route::get('/{user}/show', \App\Http\Controllers\User\ShowController::class)->name('user.show');
        Route::get('/{user}/edit', \App\Http\Controllers\User\EditController::class)->name('user.edit');
        Route::patch('/{user}/update', \App\Http\Controllers\User\UpdateController::class)->name('user.update');
        Route::delete('/{user}/delete', \App\Http\Controllers\User\DeleteController::class)->name('user.destroy');
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', \App\Http\Controllers\Product\IndexController::class)->name('product.index');
        Route::get('/create', \App\Http\Controllers\Product\CreateController::class)->name('product.create');
        Route::post('/store', \App\Http\Controllers\Product\StoreController::class)->name('product.store');
        Route::get('/{product}/show', \App\Http\Controllers\Product\ShowController::class)->name('product.show');
        Route::get('/{product}/edit', \App\Http\Controllers\Product\EditController::class)->name('product.edit');
        Route::patch('/{product}/update', \App\Http\Controllers\Product\UpdateController::class)->name('product.update');
        Route::delete('/{product}/delete', \App\Http\Controllers\Product\DeleteController::class)->name('product.destroy');
    });

    Route::group(['prefix' => 'groups'], function () {
        Route::get('/', \App\Http\Controllers\Group\IndexController::class)->name('group.index');
        Route::get('/create', \App\Http\Controllers\Group\CreateController::class)->name('group.create');
        Route::post('/store', \App\Http\Controllers\Group\StoreController::class)->name('group.store');
        Route::get('/{group}/show', \App\Http\Controllers\Group\ShowController::class)->name('group.show');
        Route::get('/{group}/edit', \App\Http\Controllers\Group\EditController::class)->name('group.edit');
        Route::patch('/{group}/update', \App\Http\Controllers\Group\UpdateController::class)->name('group.update');
        Route::delete('/{group}/delete', \App\Http\Controllers\Group\DeleteController::class)->name('group.destroy');
    });

});


Route::get('{pag}', \App\Http\Controllers\Client\IndexController::class)->name('client.index');
