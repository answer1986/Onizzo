<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CarouselController extends Controller
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
     * Mostrar las imágenes del carrusel
     */
    public function index()
    {
        $images = Image::where('section', 'nosotros')
                      ->whereNotNull('carousel_order')
                      ->orderBy('carousel_order')
                      ->get();
        
        return view('admin.carousel.index', compact('images'));
    }

    /**
     * Agregar nueva imagen al carrusel
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'alt_text_es' => 'required|string',
            'alt_text_en' => 'nullable|string',
            'description' => 'nullable|string'
        ]);

        // Obtener el siguiente orden disponible
        $nextOrder = Image::where('section', 'nosotros')
                         ->whereNotNull('carousel_order')
                         ->max('carousel_order') + 1;

        $image = $request->file('image');
        $fileName = time() . '_carousel_' . $nextOrder . '.' . $image->getClientOriginalExtension();
        $path = 'image/uploads/' . $fileName;

        // Crear directorio si no existe
        $uploadDir = public_path('image/uploads');
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Mover la imagen
        $image->move($uploadDir, $fileName);

        // Crear registro en base de datos
        Image::create([
            'key' => 'carousel_image_' . $nextOrder,
            'path' => $path,
            'alt_text_es' => $request->alt_text_es,
            'alt_text_en' => $request->alt_text_en ?: $request->alt_text_es,
            'section' => 'nosotros',
            'description' => $request->description ?: 'Imagen del carrusel',
            'is_active' => true,
            'carousel_order' => $nextOrder
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Imagen agregada al carrusel exitosamente',
            'reload' => true
        ]);
    }

    /**
     * Eliminar imagen del carrusel
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|integer'
        ]);

        $image = Image::findOrFail($request->id);
        
        // Eliminar archivo físico si está en uploads
        if ($image->path && file_exists(public_path($image->path)) && strpos($image->path, 'uploads/') !== false) {
            unlink(public_path($image->path));
        }

        $image->delete();

        // Reordenar las imágenes restantes
        $this->reorderImages();

        return response()->json([
            'success' => true,
            'message' => 'Imagen eliminada del carrusel',
            'reload' => true
        ]);
    }

    /**
     * Reordenar imágenes del carrusel
     */
    public function reorder(Request $request)
    {
        $request->validate([
            'order' => 'required|array',
            'order.*' => 'integer'
        ]);

        $images = Image::where('section', 'nosotros')
                      ->whereNotNull('carousel_order')
                      ->get();

        foreach ($request->order as $index => $imageId) {
            $image = $images->find($imageId);
            if ($image) {
                $image->carousel_order = $index + 1;
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
        $images = Image::where('section', 'nosotros')
                      ->whereNotNull('carousel_order')
                      ->orderBy('carousel_order')
                      ->get();

        foreach ($images as $index => $image) {
            $image->carousel_order = $index + 1;
            $image->save();
        }
    }
} 