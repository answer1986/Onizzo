<?php

use App\Models\Content;
use App\Models\Image;

if (!function_exists('editableContent')) {
    /**
     * Mostrar contenido editable con lapicito si está en modo edición
     */
    function editableContent($key, $section = 'general', $default = '', $type = 'text') {
        $content = Content::getByKey($key);
        $value = $content !== $key ? $content : $default;
        
        if (session('admin_authenticated')) {
            return view('components.editable-text', [
                'key' => $key,
                'value' => $value,
                'section' => $section,
                'type' => $type
            ])->render();
        }
        
        return $value;
    }
}

if (!function_exists('editableImage')) {
    /**
     * Mostrar imagen editable con lapicito si está en modo edición
     */
    function editableImage($key, $defaultPath, $alt = '', $section = 'general', $class = '', $style = '') {
        $image = Image::getByKey($key);
        $imagePath = $image ? $image->path : $defaultPath;
        $altText = $image ? $image->getAltText() : $alt;
        
        // Para producción, asegurar que las rutas funcionen correctamente
        $displayPath = $imagePath;
        if ($image) {
            // Si es una imagen de la BD, usar ruta relativa
            $displayPath = '/' . $imagePath;
        } else {
            // Si es imagen por defecto, mantener el path original
            $displayPath = $defaultPath;
        }
        
        if (session('admin_authenticated')) {
            return view('components.editable-image', [
                'key' => $key,
                'path' => $displayPath,
                'alt' => $altText,
                'section' => $section,
                'class' => $class,
                'defaultPath' => $defaultPath,
                'style' => $style
            ])->render();
        }
        
        $styleAttr = $style ? ' style="' . $style . '"' : '';
        // Para usuarios normales, usar asset() solo con imágenes por defecto
        if ($image) {
            return '<img src="' . $displayPath . '" alt="' . $altText . '" class="' . $class . '"' . $styleAttr . '>';
        } else {
            return '<img src="' . asset($defaultPath) . '" alt="' . $altText . '" class="' . $class . '"' . $styleAttr . '>';
        }
    }
}

if (!function_exists('getCarouselImages')) {
    /**
     * Obtener imágenes del carrusel dinámicamente
     */
    function getCarouselImages() {
        return Image::where('section', 'nosotros')
                   ->whereNotNull('carousel_order')
                   ->orderBy('carousel_order')
                   ->get();
    }
}

if (!function_exists('getSliderImages')) {
    /**
     * Obtener imágenes del slider dinámicamente
     */
    function getSliderImages() {
        return Image::where('section', 'slider')
                   ->whereNotNull('slider_order')
                   ->orderBy('slider_order')
                   ->get();
    }
}

/**
 * Obtener el ID de conversión de Google Ads
 */
function getGoogleAdsConversionId($type = 'default')
{
    $config = config('google-ads');
    
    if ($type === 'default') {
        return $config['conversion_id'];
    }
    
    return $config['conversions'][$type]['id'] ?? $config['conversion_id'];
}

/**
 * Obtener el label de conversión de Google Ads
 */
function getGoogleAdsConversionLabel($type = 'default')
{
    $config = config('google-ads');
    
    if ($type === 'default') {
        return $config['conversion_label'];
    }
    
    return $config['conversions'][$type]['label'] ?? $config['conversion_label'];
}

/**
 * Generar el código de conversión de Google Ads
 */
function generateGoogleAdsConversionCode($type = 'default', $value = null)
{
    $conversionId = getGoogleAdsConversionId($type);
    $conversionLabel = getGoogleAdsConversionLabel($type);
    
    $code = "gtag('event', 'conversion', {";
    $code .= "'send_to': '{$conversionId}/{$conversionLabel}'";
    
    if ($value) {
        $code .= ", 'value': {$value}";
    }
    
    $code .= "});";
    
    return $code;
}

 