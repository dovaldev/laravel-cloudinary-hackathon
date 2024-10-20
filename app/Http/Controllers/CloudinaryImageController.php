<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CloudinaryImage;
use Illuminate\Support\Facades\Auth;


class CloudinaryImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // load all imagens from the user or actual ip
        $user = Auth::user();
        $cloudinaryImages = null;

        $helpers = new \App\Tools\Helpers();
        $hashedIp = $helpers->getHasedIp(); // Obtener la IP hasheada

        if ($user) {
            // Obtener las imágenes por user_id o por user_ip_hashed si no hay imágenes con el user_id.
            $cloudinaryImages = CloudinaryImage::where('user_id', $user->id)
                ->orWhere('user_ip_hashed', $hashedIp)
                ->paginate(22);
        } else {
            // Si no hay usuario autenticado, obtener solo por la IP hasheada.
            $cloudinaryImages = CloudinaryImage::where('user_ip_hashed', $hashedIp)->paginate(20);
        }

        // Devolvemos las imágenes si las encontramos, si no, devolvemos un array vacío.
        $cloudinaryImages = $cloudinaryImages->isNotEmpty() ? $cloudinaryImages : [];

        if ($cloudinaryImages !== null && count($cloudinaryImages) > 0) {
            return view('pages.cloudinary.my-gallery', compact('cloudinaryImages'));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CloudinaryImage $cloudinaryImage)
    {
        $user = Auth::user();
        // verificar si el usuario es null o es de un usuario
        if ($user) {
            // si el usuario es el dueño de la imagen
            if ($cloudinaryImage->user_id === $user->id) {
                return view('pages.cloudinary.show', compact('cloudinaryImage'));
            } else {
                $helpers = new \App\Tools\Helpers();
                if ($cloudinaryImage->user_ip_hashed === $helpers->getHasedIp()) {
                    return view('pages.cloudinary.show', compact('cloudinaryImage'));
                } else {
                    abort(404);
                }
            }
        } else {
            // si el usuario es null
            $helpers = new \App\Tools\Helpers();
            if ($cloudinaryImage->user_ip_hashed === $helpers->getHasedIp()) {
                return view('pages.cloudinary.show', compact('cloudinaryImage'));
            } else {
                abort(404);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CloudinaryImage $cloudinaryImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CloudinaryImage $cloudinaryImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CloudinaryImage $cloudinaryImage)
    {
        //
    }
}
