<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.main');
})->name('home');

Route::get('form', [GuestController::class, 'index'])->name('guest');
Route::post('/getRegency', [GuestController::class, 'getRegency'])->name('getRegency');
Route::post('form/store', [GuestController::class, 'store'])->name('guest.store');
Route::get('question', [QuestionController::class, 'index'])->name('guest.question');
Route::post('question/store', [QuestionController::class, 'store'])->name('question.store');
Route::get('question/result', [ResultController::class, 'index'])->name('result');