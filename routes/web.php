<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\StoreController;
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
    return view('public-page.public-info-store');
});


Route::prefix('dashboard')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('auth.login');
    Route::post('admin/login', [AuthController::class, 'adminLogin'])->name('admin.login');
});

Route::prefix('dashboard/admin')->middleware('auth:admin')->group(function () {
    Route::get('home', [HomeController::class, 'showHome'])->name('home');
    Route::resource('categories', CategoryController::class);
    Route::resource('stores', StoreController::class);
    Route::get('allData', [StoreController::class, 'indexAll'])->name('stores.all');
    Route::get('search/store', [StoreController::class, 'search_Store'])->name('stores.search');
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::prefix('public-page')->group(function () {
    Route::get('/', [PublicController::class, 'index'])->name('public.index');
    Route::get('/stores', [PublicController::class, 'indexStores'])->name('public.stores.index');
    Route::get('/stores/{store}/info', [PublicController::class, 'infoStores'])->name('public.stores.info');
    Route::get('/search/store', [PublicController::class, 'search_store_public'])->name('stores.search.public');
});


Route::resource('rates', RateController::class);
