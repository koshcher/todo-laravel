<?php

use App\Http\Controllers\TodoController;
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

Route::get('/', [TodoController::class, 'home'])->name('home');

Route::get('/remove/{id}', [TodoController::class, 'remove'])->name('remove');

Route::post('/add', [TodoController::class, 'add'])->name('add');

Route::get('/change_status/{id}/{status}', [TodoController::class, 'change_status'])->name('change_status');

Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('edit');

Route::post('/update/{id}', [TodoController::class, 'update'])->name('update');
