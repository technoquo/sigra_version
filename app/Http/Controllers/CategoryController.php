<?php

namespace App\Http\Controllers;

use App\Models\Age;

use App\Models\Category;
use App\Models\CategoryAge;
use App\Models\Multimedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
   public function index($slug)
   {

       $age_id = Age::where('name', $slug)->first()->id;
       $categoryAges = CategoryAge::where('age_id', $age_id)->with('category')->get();


        return view('pages.categories', compact('categoryAges', 'slug'));
   }

    public function collective($slug)
    {
        // Buscar la categoría por slug
        $category = Category::where('slug', $slug)->firstOrFail();

        // Obtener todos los registros relacionados en la tabla pivote
        $collectives = DB::table('category_multimedia')
            ->where('category_id', $category->id)
            ->get();

        // Extraer los IDs de multimedia
        $multimediaIds = $collectives->pluck('multimedia_id');

        // Obtener todos los multimedia relacionados
        $multimedias = Multimedia::whereIn('id', $multimediaIds)->get();

        // Extraer los IDs de video
        $videoIds = $multimedias->pluck('video_id');

        // Obtener todos los videos relacionados
        $videos = DB::table('videos')->whereIn('id', $videoIds)->orderBy('videos.name','asc')->get();

        // Mostrar todos los videos
        return view('pages.collectives', compact('videos'));
    }

}
