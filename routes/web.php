<?php

use App\Http\Controllers\NewsCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

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

Route::get('/', function() {
    return redirect('/news');
  });
  
Route::Resource('/news', NewsController::class)->except('show');
Route::resource('/news/categories', NewsCategoryController::class)->except(['show'])->names([
  'index' => 'news.categories.index',
  'create' => 'news.categories.create',
  'store' => 'news.categories.store',
  'edit' => 'news.categories.edit',
]);

Route::delete('/news/categories/destroy/{category}', [NewsCategoryController::class, 'destroy'])->name('news.categories.destroy');
