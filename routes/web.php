<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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

Route::get('/', [App\Http\Controllers\Controller::class , 'index'])
    ->name('record');

Route::get('/register', function () {
    return view('welcome');
});

Route::post('/add', [App\Http\Controllers\Controller::class , 'add'])->name('add');

Route::get('/edit/{id}', [App\Http\Controllers\Controller::class,'edit'])->name('edit');

Route::post('/update/{id}', [App\Http\Controllers\Controller::class , 'update'])->name('update');

Route::get('/delete/{id}', [App\Http\Controllers\Controller::class , 'delete'])->name('delete');

