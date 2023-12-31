<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;

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



Route::get('/', [LoginController::class,'login']);

Route::post('/', [LoginController::class,'loginDone']);

//Route::get('/student_home', [LoginController::class,'student']);

Route::get('/admin', [AdminController::class,'admin']);
Route::post('/admin', [AdminController::class,'adminSave']);
Route::get('/display', [AdminController::class,'display']);
Route::get('/verify/{id}', [AdminController::class,'verify']);


Route::get('/student/{id}', [StudentController::class,'student']);
Route::post('/student/{id}', [StudentController::class,'update']);
