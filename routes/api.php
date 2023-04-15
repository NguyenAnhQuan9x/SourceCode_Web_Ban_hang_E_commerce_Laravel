<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Client\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* Route::get('banners/', [BannerController::class, 'index'])->name('banners.index');
Route::get('banners/create', [BannerController::class, 'create'])->name('banners.create');
Route::post('banners/store', [BannerController::class, 'store']);
Route::get('banners/edit/{banner}', [BannerController::class, 'edit'])->name('banners.edit');
Route::put('banners/update/{banner}', [BannerController::class, 'update'])->name('banners.update');
Route::delete('banners/delete/{banner}', [BannerController::class, 'delete'])->name('banners.delete'); */
/* Route::group(['prefix'=>'admin'],function(){
    Route::resource('banners',BannerController::class);
}); */