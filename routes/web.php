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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function(){
    Route::prefix('/user/')->group(function(){
        // Route::get('galleries/create', 'GalleryController@galleryCreate')->name('galleryCreate');
        Route::get('galleries/create', [App\Http\Controllers\GalleryController::class, 'galleryCreate'])->name('galleryCreate');
        Route::post('galleries/store', [App\Http\Controllers\GalleryController::class, 'galleryStore'])->name('galleryStore');
        Route::get('galleries/show/{id}', [App\Http\Controllers\GalleryController::class, 'galleryShow'])->name('galleryShow');
        Route::get('galleries/edit/{id}', [App\Http\Controllers\GalleryController::class, 'galleryEdit'])->name('galleryEdit');
        Route::post('galleries/update/{id}', [App\Http\Controllers\GalleryController::class, 'galleryUpdate'])->name('galleryUpdate');
        Route::get('galleries/delete/{id}', [App\Http\Controllers\GalleryController::class, 'galleryDelete'])->name('galleryDelete');

        // photo routes
        Route::get('galleries/photo/create/{id}', [App\Http\Controllers\GalleryController::class, 'photoCreate'])->name('photoCreate');
        Route::post('galleries/photo/store', [App\Http\Controllers\GalleryController::class, 'photoStore'])->name('photoStore');
        Route::get('galleries/photo/show/{id}', [App\Http\Controllers\GalleryController::class, 'photoShow'])->name('photoShow');
        Route::get('galleries/photo/edit/{id}', [App\Http\Controllers\GalleryController::class, 'photoEdit'])->name('photoEdit');
        Route::post('galleries/photo/update/{id}', [App\Http\Controllers\GalleryController::class, 'photoUpdate'])->name('photoUpdate');
        Route::get('galleries/photo/delete/{id}/{galleryid}', [App\Http\Controllers\GalleryController::class, 'photoDelete'])->name('photoDelete');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
