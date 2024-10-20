<?php

namespace App\Tools;

class Helpers
{

    public function getHasedIp()
    {
        // obtener la ip del usuario
        $ip = request()->ip();
        $hasedIp = hash('sha256', $ip);
        return $hasedIp;
    }

    protected function countTodayUploads($user)
    {
        if ($user) {
            // Contar las imágenes subidas por el usuario hoy (sin importar la hora)
            $count = \App\Models\CloudinaryImage::where('user_id', $user->id)
                ->whereDate('created_at', \Carbon\Carbon::today())
                ->count();
            return $count;
        } else {
            // Obtener la IP hasheada del usuario
            $hasedIp = $this->getHasedIp();
            // Contar las imágenes subidas por el usuario hoy (sin importar la hora)
            $count = \App\Models\CloudinaryImage::where('user_ip_hashed', $hasedIp)
                ->whereDate('created_at', \Carbon\Carbon::today())
                ->count();
            return $count;
        }
    }

    public function canUploadImages($user){
        // Si es usuario puede subir 10 al día si el usuario es null solo 3
        if ($user) {
            return $this->countTodayUploads($user) < 100;
        } else {
            return $this->countTodayUploads($user) < 300;
        }
    }
}
