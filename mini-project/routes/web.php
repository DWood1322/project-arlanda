<?php

use App\Http\Controllers\projectController;
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
    return view('welcome');
});

Route::get('/project',[projectController::class,'index'])->name('project');
Route::get('/create',[projectController::class,'create'])->name('create');
Route::post('/insert',[projectController::class,'insert'])->name('insert');
Route::get('/edit/{id}',[projectController::class,'edit'])->name('edit');
Route::post('/update/{id}',[projectController::class,'update'])->name('update');

Route::delete('/delete', [projectController::class, 'delete'])->name('delete');




