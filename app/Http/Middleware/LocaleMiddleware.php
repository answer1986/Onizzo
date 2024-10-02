<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleMiddleware
{
    public function handle($request, Closure $next)
    {
        $locale = Session::get('locale', config('app.locale')); // Usa el idioma de la sesión o el predeterminado
        App::setLocale($locale);

        return $next($request);
    }
}
