<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;

Route::get('/', function () {
    return view('index');
});

Route::get('/lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');