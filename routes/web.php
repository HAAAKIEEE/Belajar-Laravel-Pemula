<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\PictureController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\HomeController;


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

Route::get('/', [StudentController::class, 'index'])->name('index');
// contoh di bawah ini salah
// Route::get('/greeting/{$id}', [ StudentController::class,'show']);
Route::get('/filter', [StudentController::class, 'filter']);

Route::get('/show/{id}', [StudentController::class, 'show'])->name('show');
// untuk update bisa menggunakan patch atau put bedanya put untuk update ke seluruhan data kalau patch untuk sebagian data
Route::get('/update_password', [HomeController::class, 'update_password'])->name('update_password');
Route::patch('/store_password', [HomeController::class, 'store_password'])->name('store_password');

// Route::get('/greeting', function () {
//     return ('Hello world!');
// })->name('greeting');
// Route::get('/greeting/{name}', function ($name) {
//     return view('example',['name'=>$name]);
// });
Route::middleware(['admin'])->group(function () {
    Route::get('/create', [StudentController::class, 'create'])->name('create');
    Route::post('/create', [StudentController::class, 'store'])->name('store');
    Route::get('/edit/{student}', [StudentController::class, 'edit'])->name('edit');
    Route::patch('/update/{student}', [StudentController::class, 'update'])->name('update');
    Route::delete('/delete/{student}', [StudentController::class, 'delete'])->name('delete');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/locale/{locale}',[LocaleController::class, 'set_locale'])->name('set_locale');
// Auth::routes();
// sorage
Route::get('/picture/create',[PictureController::class,'create'])->name('picture.create');
Route::post('/picture/create',[PictureController::class,'store'])->name('picture.store');
Route::get('/picture/{picture}',[PictureController::class,'show'])->name('picture.show');
Route::delete('/picture/{picture}',[PictureController::class,'delete'])->name('picture.delete');
Route::get('/copy/{picture}',[PictureController::class,'copy'])->name('picture.copy');
Route::get('/move/{picture}',[PictureController::class,'move'])->name('picture.move');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
