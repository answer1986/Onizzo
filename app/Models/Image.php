<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'path',
        'alt_text_es',
        'alt_text_en',
        'section',
        'description',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * Obtener la URL completa de la imagen
     */
    public function getUrlAttribute()
    {
        return asset($this->path);
    }

    /**
     * Obtener el texto alternativo en el idioma actual
     */
    public function getAltText($lang = null)
    {
        $lang = $lang ?: app()->getLocale();
        
        if ($lang === 'es') {
            return $this->alt_text_es ?: $this->alt_text_en;
        } else {
            return $this->alt_text_en ?: $this->alt_text_es;
        }
    }

    /**
     * Obtener imagen por clave
     */
    public static function getByKey($key)
    {
        return self::where('key', $key)
                   ->where('is_active', true)
                   ->first();
    }
}
