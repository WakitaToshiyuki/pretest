<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

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

Route::get('/', [ItemController::class, 'index']);
// Route::middleware('auth')->group(function () {
//     Route::get('/', [ItemController::class, 'index']);
// });

Route::get('/login',[ItemController::class,'login'])->name('login');
// Route::post('/login',[ItemController::class,'check']);
Route::get('/register',[ItemController::class,'register']);
// Route::post('/register',[ItemController::class,'save']);
// Route::post('/logout',[ItemController::class,'logout']);

// 仮組 ↓

Route::get('/item/{$item->id}', [ItemController::class, 'detail']);
// Route::get('/item/{item_id}', [ItemController::class, 'detail']);
// Route::get('/mypage', [ItemController::class, 'mypage']);
// Route::get('/sell', [ItemController::class, 'sell']);
// Route::get('/mypage/profile', [ItemController::class, 'edit']);
// Route::get('/purchase/{item_id}', [ItemController::class, 'buy']);

Route::middleware('auth')->group(function () {
    Route::get('/purchase/{item_id}', [ItemController::class, 'buy']);
    Route::get('/purchase/address/{item_id}', [ItemController::class, '']);
    Route::get('/sell', [ItemController::class, 'sell']);
    Route::get('/mypage', [ItemController::class, 'mypage']);
    Route::get('/mypage/profile', [ItemController::class, 'edit']);
    Route::get('/mypage?page=buy', [ItemController::class, '']);
    Route::get('/mypage?page=sell', [ItemController::class, '']);
});