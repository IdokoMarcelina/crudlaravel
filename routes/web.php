<?php

use App\Http\Controllers\pageController;
use App\Models\myTask;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $tasks = myTask::orderBy( 'created_at','desc')->paginate(2);
    return view('welcome', ['tasks' => $tasks]);
})->name('home');

Route::post('create', [pageController::class,'create']);
Route::get('/edit/{name}', [pageController::class,'edit']);
Route::put('update/{id}', [pageController::class,'update']);
Route::delete('delete/{id}', [pageController::class,'delete']);
