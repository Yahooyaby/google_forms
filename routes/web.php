<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AnswerOptionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResponseController;


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
    Route::get('/forms/{form}',[FormController::class,'show'])->name('forms.show');
    Route::get('/forms/{form}/edit',[FormController::class,'edit'])->name('forms.edit');
    Route::put('/forms/{form}',[FormController::class,'update'])->name('forms.update');
    Route::delete('/forms/{form}', [FormController::class, 'destroy'])->name('forms.destroy');
    Route::post('/forms',[FormController::class,'store'])->name('forms.store');
    Route::get('/forms/{form}/questions/create',[QuestionController::class,'create'])->name('forms.questions.create');
    Route::post('/forms/{form}/questions',[QuestionController::class,'store'])->name('forms.questions.store');
    Route::get('/questions/{question}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
    Route::put('/questions/{question}', [QuestionController::class, 'update'])->name('questions.update');
    Route::delete('/questions/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');
    Route::post('/forms/{form}/answer_options',[AnswerOptionController::class,'store'])->name('forms.answerOption.store');
    Route::get('/home',[FormController::class,'home'])->name('forms.home');
    Route::post('/responses',[ResponseController::class,'store'])->name('responses.store');
    Route::get('/responses/answers/create',[AnswerController::class,'create'])->name('answers.create');
    Route::post('/responses/answers',[AnswerController::class,'store'])->name('answers.store');
    Route::get('/responses/{id}',[ResponseController::class,'show'])->name('responses.show');



});

Route::middleware('guest')->group(function () {
    Route::get('/login',[UserController::class,'login'])->name('login');
    Route::post('/login',[UserController::class,'logging'])->name('logging');

});
Route::get('/',[UserController::class,'index'])->name('home');
Route::get('/register',[UserController::class,'create'])->name('create');
Route::post('/register/store',[UserController::class,'store'])->name('store');

