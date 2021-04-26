<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BuscadorCep;


Route::get('/', [BuscadorCep::class, 'getHome'])->name('home');
Route::get('/search', [BuscadorCep::class, 'BuscadorCep'])->name('search');