<?php

namespace App\Http\Controllers;

use App\Models\SocialMediaDeputies as ModelsSocialMediaDeputies;

class  SocialMediaDeputies extends Controller
{
    public function getTopFiveSocialMedias()
    {
        $deputies = ModelsSocialMediaDeputies::selectRaw('social_media, COUNT(id) as total' )
        ->groupBy('social_media')
        ->orderByDesc('total')
        ->limit(5)
        ->get();

        return response()->json($deputies);
    }
}
