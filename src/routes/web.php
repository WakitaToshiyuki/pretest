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
Route::get('/login',[ItemController::class,'login'])->name('login');
Route::get('/register',[ItemController::class,'register']);
Route::post('/register',[ItemController::class,'save'])->name('register');
Route::get('/item/{item_id}', [ItemController::class, 'detail'])->name('detail');

//仮↓
Route::middleware('auth')->group(function () {
    Route::get('/purchase/{item_id}', [ItemController::class, 'buy'])->name('buy');
    Route::get('/purchase/address/{item_id}', [ItemController::class, 'address'])->name('address');
    Route::post('/purchase/address/{item_id}', [ItemController::class, 'change'])->name('change');
    Route::get('/sell', [ItemController::class, 'sell']);
    Route::get('/mypage', [ItemController::class, 'mypage']);
    Route::get('/mypage/profile', [ItemController::class, 'edit']);
    Route::post('/mypage/profile', [ItemController::class, 'update']);
    Route::get('/mypage?page=buy', [ItemController::class, '']);
    Route::get('/mypage?page=sell', [ItemController::class, '']);
    Route::post('/item/{item_id}/like', [ItemController::class, 'toggleLike'])->name('like');
    Route::post('/item/{item_id}/comment', [ItemController::class, 'comment'])->name('comment');
});

