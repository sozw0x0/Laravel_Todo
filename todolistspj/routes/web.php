<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;


Route::get('/todo', [Todocontroller::class, 'index']);

Route::prefix('/todo')->group(function(){
    Route::post('/create', [Todocontroller::class, 'create']);
    Route::post('/update/{id?}', [Todocontroller::class, 'update']);
    Route::post('/delete/{id?}', [Todocontroller::class, 'delete']);
});
