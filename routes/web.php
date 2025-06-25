<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\ImageController;

Route::get('/', function () {
    return view('index');
});

Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');

// APIs para edición inline (nuevas rutas)
Route::post('/api/admin/content/update', [AdminController::class, 'updateContent'])->name('api.content.update');
Route::post('/api/admin/image/update', [AdminController::class, 'updateImage'])->name('api.image.update');
Route::post('/api/admin/image/delete', [AdminController::class, 'deleteImage'])->name('api.image.delete');

// Ruta de prueba para debug
Route::get('/test-delete', function() {
    return view('test-delete');
});
Route::get('/test-delete-api', function() {
    \Log::info('=== TEST DELETE API CALLED ===');
    return response()->json([
        'success' => true,
        'message' => 'API funcionando',
        'session_auth' => session('admin_authenticated'),
        'method' => request()->method()
    ]);
});

// Rutas del Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::post('/login', [AdminController::class, 'authenticate'])->name('authenticate');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Rutas de contenido
    Route::resource('contents', ContentController::class);
    Route::post('contents/import', [ContentController::class, 'importFromMessages'])->name('contents.import');
    
    // Rutas de imágenes
    Route::resource('images', ImageController::class);
    Route::post('images/import', [ImageController::class, 'importExisting'])->name('images.import');
});

// Ruta de depuración
Route::get('/debug-lang', function () {
    dd([
        'current_locale' => app()->getLocale(),
        'available_locales' => config('app.available_locales'),
        'translation_example' => __('messages.index'),
        'session_locale' => session('locale'),
    ]);
});