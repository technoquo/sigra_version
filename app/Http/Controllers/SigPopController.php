<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Multimedia;
use Illuminate\Http\Request;

class SigPopController extends Controller
{
    public function index()
    {
        $multimedias = Multimedia::with('video')
        ->whereHas('video', function ($query) {
            $query->where('type', 'publique') // Filtro por type
            ->where('status', 1);
        })
        ->get()
        ->sortBy(function ($multimedia) {
            return $multimedia->video->name; // Ordena alfabéticamente por name
        });

        return view('pages.sigpop', compact('multimedias'));      
                              
    }

    public function vimeo($vimeo) {
       
        $video = Video::where('slug', $vimeo)
                 ->where('status', 1)
                 ->where('type', 'publique')
                 ->firstOrFail();
        

        return view('pages.videosigpop', compact('video'));
    }
}
