<?php

namespace App\Http\Controllers;

use App\Models\Age;
use App\Models\Video;
use App\Models\Category;
use App\Models\Multimedia;
use App\Models\CategoryAge;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index($age, $category)
    {
        $ageModel = Age::where('name', $age)->firstOrFail();
        $categoryModel = Category::where('slug', $category)->firstOrFail();

        $subcategories = SubCategory::select([
                'sub_categories.id',
                'sub_categories.category_id',
                'sub_categories.name',
                'ages.id as age_id',
                'ages.name as age_name',
                'sub_categories.image',
                'sub_categories.slug'
            ])
            ->join('categories', 'categories.id', '=', 'sub_categories.category_id')
            ->join('multimedia', 'multimedia.sub_category_id', '=', 'sub_categories.id')
            ->join('ages', 'ages.id', '=', 'multimedia.age_id')
            ->where('ages.id', $ageModel->id)
            ->where('categories.id', $categoryModel->id)
            ->distinct()
            ->get();

       

        return view('pages.subcategories', compact('subcategories','age'));
    }

    public function show($age, $category, $subcategory)
    {


      $subcategory_id = SubCategory::where('slug', $subcategory)->firstOrFail();
      $age_id = Age::where('name', $age)->firstOrFail();

      $multimedias = Multimedia::where('sub_category_id', $subcategory_id->id)
                   ->where('age_id', $age_id->id)
                   ->get();
       return view('pages.videos', compact('multimedias', 'age', 'category', 'subcategory'));
    }

    public function vimeo($age, $category, $subcategory, $vimeo) {
       
        $video = Video::where('slug', $vimeo)->firstOrFail();
        

        return view('pages.video', compact('video'));
    }
}