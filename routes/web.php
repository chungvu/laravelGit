<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/checkDB', function ()
{
    dd(DB::connection()->getDatabaseName());
});
require __DIR__.'/auth.php';


Route::resource('products', ProductController::class);
Route::get('/blo1g',function (){
    return view('blog/index');
});

//Blog
Route::get('/blog', [\App\Http\Controllers\BlogController::class, 'index'])->name('blogListWeb');
Route::get('/blog/{id}', [\App\Http\Controllers\BlogController::class, 'show'])->name('blogShowWeb');