<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Busca el usuario en la base de datos
            $user = User::where('email', $googleUser->email)->first();

            if ($user) {
                // Si el usuario ya existe, lo autentica
                Auth::login($user);
            } else {
                // Si no existe, lo crea
                /**$profile_photo_path = $googleUser->avatar;

                // Usamos cURL para descargar la imagen
                $ch = curl_init($profile_photo_path);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // sigue redirecciones si las hay
                $imageData = curl_exec($ch);
                curl_close($ch);

                if ($imageData !== false) {
                    $email_slug = Str::slug($googleUser->email);
                    $name = $email_slug . '-' . time() . '.jpg';
                    // Guardamos la imagen en la carpeta de almacenamiento
                    Storage::disk('public')->put('profile-photos/' . $name, $imageData);
                    $path = 'profile-photos/' . $name;
                } else {
                    $path = null; // Si no se pudo descargar la imagen
                }*/

                // Crear el usuario en la base de datos
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'email_verified_at' => now(),
                    'password' => bcrypt(Str::random(16)) // Contraseña aleatoria
                ]);

                Auth::login($user);
            }

            return redirect()->intended('/'); // Redirige al usuario a la página principal después del login

        } catch (\Exception $e) {
            Log::error('Error al iniciar sesión con Google: ' . $e->getMessage());
            if (!$googleUser) {
                return redirect('/login')->withErrors('No se pudo obtener los datos de Google.');
            }
        }
    }
}
