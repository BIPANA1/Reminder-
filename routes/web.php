<?php

use App\Http\Controllers\GoogleController;
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

Route::get('/', [HomeController::class, 'welcome']);
Route::get('/home', [ReminderController::class, 'home']);
Route::post('/reminder', [ReminderController::class, 'reminder']);
Route::get('/reminder-edit/{id}', [ReminderController::class, 'update']);
Route::get('/reminder-delete/{id}', [ReminderController::class, 'destroy']);
Route::get('/reminder-filter',[ReminderController::class,'showReminders'])->name('reminders.filter');

 
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('/logout',[ReminderController::class,'logout']);