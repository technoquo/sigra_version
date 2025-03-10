<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Member;
use App\Models\Multimedia;
use Illuminate\Http\Request;

class MonSigraController extends Controller
{
    
  public function index()
    {
   
      
            $members = Member::where('subscriptions_id', '=', 1)
            ->where('status', '=', 1)
            ->where('users_id', '=', auth()->user()->id)
            ->get();

            // Recolectar todos los videos_id de los miembros
            $videosIds = $members->pluck('videos_id')->flatMap(function ($videos) {
            return is_string($videos) ? json_decode($videos, true) : $videos;
            })->unique()->values()->all();

 

            // Obtener los multimedias filtrados y ordenados
            $multimedias = Multimedia::query()
            ->with('video')
            ->whereHas('video', function ($query) {
            $query->where('type', 'privé')
            ->where('status', 1);
            })
            ->whereIn('multimedia.id', $videosIds) // Especificar la tabla multimedia.id
            ->join('videos', 'multimedia.video_id', '=', 'videos.id')
            ->orderBy('videos.name')
            ->select('multimedia.*')
            ->get();

          

            return view('pages.monsigra', compact('multimedias'));

        
    }
    
    public function vimeo($vimeo) {
       
       
        $video = Video::where('slug', $vimeo)
                 ->where('status', 1)
                 ->where('type', 'privé')
                 ->firstOrFail();


        return view('pages.videosigpop', compact('video'));
    }
                       

    
}
