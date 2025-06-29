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
    function editableImage($key, $defaultPath, $alt = '', $section = 'general', $class = '') {
        $image = Image::getByKey($key);
        $imagePath = $image ? $image->path : $defaultPath;
        $altText = $image ? $image->getAltText() : $alt;
        
        if (session('admin_authenticated')) {
            return view('components.editable-image', [
                'key' => $key,
                'path' => $imagePath,
                'alt' => $altText,
                'section' => $section,
                'class' => $class,
                'defaultPath' => $defaultPath
            ])->render();
        }
        
        return '<img src="' . asset($imagePath) . '" alt="' . $altText . '" class="' . $class . '">';
    }
} 