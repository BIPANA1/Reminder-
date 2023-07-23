<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReminderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'welcome']);
Route::post('/reminder',[ReminderController::class,'reminder']);
Route::get('/edit/{id}',[ReminderController::class,'edit']);
Route::post('/reminder-edit/{id}',[ReminderController::class,'update']);
Route::get('/reminder-delete/{id}',[ReminderController::class,'destroy']);