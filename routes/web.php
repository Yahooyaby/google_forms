<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionController;


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





Route::middleware('auth')->group(function () {
    Route::get('/logout',[UserController::class,'logout'])->name('logout');
    Route::get('/forms',[FormController::class,'index'])->name('forms.index');
    Route::get('/forms/{form_id}',[FormController::class,'show'])->name('forms.show');
    Route::post('/forms',[FormController::class,'store'])->name('forms.store');
    Route::get('/forms/{form_id}/question',[QuestionController::class,'create'])->name('question.create');
    Route::post('/forms/{form_id}/question',[QuestionController::class,'store'])->name('question.store');


});

Route::middleware('guest')->group(function () {
    Route::get('/login',[UserController::class,'login'])->name('login');
    Route::post('/login',[UserController::class,'logging'])->name('logging');

});
Route::get('/',[UserController::class,'index'])->name('home');
Route::get('/register',[UserController::class,'create'])->name('create');
Route::post('/register/store',[UserController::class,'store'])->name('store');

