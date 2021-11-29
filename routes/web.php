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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'article'], function () {
  Route::get('detail/{id}', [App\Http\Controllers\HomeController::class, 'detail'])->name('detail');
  Route::get('person/{id}', [App\Http\Controllers\HomeController::class, 'person'])->name('person');
});
Route::group(['prefix' => 'rakuten'], function () {
  Route::get('{id}', [App\Http\Controllers\SearchController::class, 'index']);
  Route::post('search', [App\Http\Controllers\SearchController::class, 'search']);
});

Route::group(['middleware' => 'auth'], function () {
  Route::group(['prefix' => 'mypage'], function () {
    Route::get('', [App\Http\Controllers\HomeController::class, 'mypage'])->name('mypage');
    Route::get('name/edit', [App\Http\Controllers\HomeController::class, 'nameedit'])->name('nameedit');
    Route::post('name/update', [App\Http\Controllers\HomeController::class, 'nameupdate'])->name('nameupdate');
    Route::get('mail/edit', [App\Http\Controllers\HomeController::class, 'mailedit'])->name('mailedit');
    Route::post('mail/update', [App\Http\Controllers\HomeController::class, 'mailupdate'])->name('mailupdate');
    Route::get('pass/edit', [App\Http\Controllers\HomeController::class, 'passedit'])->name('passedit');
    Route::post('pass/update', [App\Http\Controllers\HomeController::class, 'passupdate'])->name('passupdate');
  });
  Route::group(['prefix' => 'article'], function () {
    Route::get('create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');
    Route::post('store', [App\Http\Controllers\HomeController::class, 'store'])->name('store');
    Route::get('edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');
    Route::post('update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update');
    Route::get('delete/{id}', [App\Http\Controllers\HomeController::class, 'delete'])->name('delete');
    Route::post('reply/{id}', [App\Http\Controllers\HomeController::class, 'reply'])->name('reply');
    Route::get('reply/edit/{id}', [App\Http\Controllers\HomeController::class, 'replyedit'])->name('replyedit');
    Route::post('reply/update/{id}', [App\Http\Controllers\HomeController::class, 'replyupdate'])->name('replyupdate');
    Route::get('reply/delete/{id}', [App\Http\Controllers\HomeController::class, 'replydelete'])->name('replydelete');
    Route::get('like/{id}', [App\Http\Controllers\HomeController::class, 'like'])->name('like');
    Route::get('unlike/{id}', [App\Http\Controllers\HomeController::class, 'unlike'])->name('unlike');
  });
});

