<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;

Route::get('/', function () {
    return view('index');
});

Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');

// Ruta de depuración
Route::get('/debug-lang', function () {
    dd([
        'current_locale' => app()->getLocale(),
        'available_locales' => config('app.available_locales'),
        'translation_example' => __('messages.index'),
        'session_locale' => session('locale'),
    ]);
});