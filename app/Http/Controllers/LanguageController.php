<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function switchLang($lang)
    {
        if (in_array($lang, ['en', 'es'])) {
            Session::put('locale', $lang); // Guardar el idioma en la sesión
        }

        return redirect()->back(); // Volver a la página anterior
    }
}
