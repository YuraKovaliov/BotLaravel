<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/db', [AdminController::class, 'Donaterbotua'])->name('admin');
