<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!session('admin_authenticated')) {
                return redirect()->route('admin.login');
            }
            return $next($request);
        });
    }

    /**
     * Mostrar las imágenes del slider
     */
    public function index()
    {
        $images = Image::where('section', 'slider')
                      ->whereNotNull('slider_order')
                      ->orderBy('slider_order')
                      ->get();
        
        return view('admin.slider.index', compact('images'));
    }

    /**
     * Agregar nueva imagen al slider
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'title_es' => 'required|string',
            'title_en' => 'nullable|string',
            'content_es' => 'required|string',
            'content_en' => 'nullable|string',
            'alt_text_es' => 'required|string',
            'alt_text_en' => 'nullable|string'
        ]);

        // Obtener el siguiente orden disponible
        $nextOrder = Image::where('section', 'slider')
                         ->whereNotNull('slider_order')
                         ->max('slider_order') + 1;

        $image = $request->file('image');
        $fileName = time() . '_slider_' . $nextOrder . '.' . $image->getClientOriginalExtension();
        $path = 'image/uploads/' . $fileName;

        // Crear directorio si no existe
        $uploadDir = public_path('image/uploads');
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Mover la imagen principal
        $image->move($uploadDir, $fileName);

        // Procesar thumbnail
        $thumbnailPath = $path; // Por defecto usar la misma imagen
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailFileName = time() . '_slider_thumb_' . $nextOrder . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnailPath = 'image/uploads/' . $thumbnailFileName;
            $thumbnail->move($uploadDir, $thumbnailFileName);
        }

        // Crear registro en base de datos
        Image::create([
            'key' => 'slider_image_' . $nextOrder,
            'path' => $path,
            'thumbnail_path' => $thumbnailPath,
            'alt_text_es' => $request->alt_text_es,
            'alt_text_en' => $request->alt_text_en ?: $request->alt_text_es,
            'title_es' => $request->title_es,
            'title_en' => $request->title_en ?: $request->title_es,
            'content_es' => $request->content_es,
            'content_en' => $request->content_en ?: $request->content_es,
            'section' => 'slider',
            'description' => 'Imagen del slider: ' . $request->title_es,
            'is_active' => true,
            'slider_order' => $nextOrder
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Imagen agregada al slider exitosamente',
            'reload' => true
        ]);
    }

    /**
     * Actualizar imagen del slider
     */
    public function update(Request $request, $id)
    {
        $image = Image::findOrFail($id);
        
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'title_es' => 'required|string',
            'title_en' => 'nullable|string',
            'content_es' => 'required|string',
            'content_en' => 'nullable|string',
            'alt_text_es' => 'required|string',
            'alt_text_en' => 'nullable|string'
        ]);

        $updateData = [
            'title_es' => $request->title_es,
            'title_en' => $request->title_en ?: $request->title_es,
            'content_es' => $request->content_es,
            'content_en' => $request->content_en ?: $request->content_es,
            'alt_text_es' => $request->alt_text_es,
            'alt_text_en' => $request->alt_text_en ?: $request->alt_text_es,
        ];

        $uploadDir = public_path('image/uploads');
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Actualizar imagen principal si se proporciona una nueva
        if ($request->hasFile('image')) {
            // Eliminar imagen anterior si está en uploads
            if ($image->path && file_exists(public_path($image->path)) && strpos($image->path, 'uploads/') !== false) {
                unlink(public_path($image->path));
            }

            $imageFile = $request->file('image');
            $fileName = time() . '_slider_' . $image->slider_order . '.' . $imageFile->getClientOriginalExtension();
            $path = 'image/uploads/' . $fileName;
            $imageFile->move($uploadDir, $fileName);
            $updateData['path'] = $path;
        }

        // Actualizar thumbnail si se proporciona uno nuevo
        if ($request->hasFile('thumbnail')) {
            // Eliminar thumbnail anterior si está en uploads y es diferente de la imagen principal
            if ($image->thumbnail_path && $image->thumbnail_path !== $image->path && 
                file_exists(public_path($image->thumbnail_path)) && strpos($image->thumbnail_path, 'uploads/') !== false) {
                unlink(public_path($image->thumbnail_path));
            }

            $thumbnail = $request->file('thumbnail');
            $thumbnailFileName = time() . '_slider_thumb_' . $image->slider_order . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnailPath = 'image/uploads/' . $thumbnailFileName;
            $thumbnail->move($uploadDir, $thumbnailFileName);
            $updateData['thumbnail_path'] = $thumbnailPath;
        }

        $image->update($updateData);

        return response()->json([
            'success' => true,
            'message' => 'Imagen del slider actualizada exitosamente'
        ]);
    }

    /**
     * Eliminar imagen del slider
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|integer'
        ]);

        $image = Image::findOrFail($request->id);
        
        // Eliminar archivos físicos si están en uploads
        if ($image->path && file_exists(public_path($image->path)) && strpos($image->path, 'uploads/') !== false) {
            unlink(public_path($image->path));
        }
        
        if ($image->thumbnail_path && $image->thumbnail_path !== $image->path && 
            file_exists(public_path($image->thumbnail_path)) && strpos($image->thumbnail_path, 'uploads/') !== false) {
            unlink(public_path($image->thumbnail_path));
        }

        $image->delete();

        // Reordenar las imágenes restantes
        $this->reorderImages();

        return response()->json([
            'success' => true,
            'message' => 'Imagen eliminada del slider',
            'reload' => true
        ]);
    }

    /**
     * Reordenar imágenes del slider
     */
    public function reorder(Request $request)
    {
        $request->validate([
            'order' => 'required|array',
            'order.*' => 'integer'
        ]);

        $images = Image::where('section', 'slider')
                      ->whereNotNull('slider_order')
                      ->get();

        foreach ($request->order as $index => $imageId) {
            $image = $images->find($imageId);
            if ($image) {
                $image->slider_order = $index + 1;
                $image->save();
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Orden actualizado exitosamente'
        ]);
    }

    /**
     * Reordenar automáticamente las imágenes
     */
    private function reorderImages()
    {
        $images = Image::where('section', 'slider')
                      ->whereNotNull('slider_order')
                      ->orderBy('slider_order')
                      ->get();

        foreach ($images as $index => $image) {
            $image->slider_order = $index + 1;
            $image->save();
        }
    }
} 