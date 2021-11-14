<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;


Route::get('/todo', [Todocontroller::class, 'index']);

Route::prefix('/todo')->group(function(){
    Route::post('/create', [Todocontroller::class, 'create']);
    Route::get('/update{id?}', [Todocontroller::class, 'edit']);
    Route::post('/update', [Todocontroller::class, 'update']);
    Route::get('/delete{id?}', [Todocontroller::class, 'delete']);
    Route::post('/delete', [Todocontroller::class, 'remove']);
});
