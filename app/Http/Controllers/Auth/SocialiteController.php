<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
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




            //dd($googleUser);

            if ($user) {
                // Si el usuario ya existe, lo autentica
                Auth::login($user);
            } else {
                // Si no existe, lo crea
                $profile_photo_path = $googleUser->avatar;
                // download the image and store in the storage
                $contents = file_get_contents($profile_photo_path);
                $email_slug = Str::slug($googleUser->email);
                $name = $email_slug . '-' . time() . '.jpg';
                // save the image in the storage folder: storage/app/public/profile-photos
                Storage::disk('public')->put('profile-photos/' . $name, $contents);
                $path = 'profile-photos/' . $name;

                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'email_verified_at' => now(),
                    'profile_photo_path' => $path ?? null,
                    'password' => bcrypt(Str::random(16))
                ]);

                Auth::login($user);
            }

            return redirect()->intended('/'); // Redirige al usuario a la página principal después del login

        } catch (\Exception $e) {
            return redirect('/login')->withErrors('Error al iniciar sesión con Google.');
        }
    }
}
