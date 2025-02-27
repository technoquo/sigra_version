<?php

namespace App\Http\Controllers;

use App\Models\Age;
use App\Models\Category;
use App\Models\CategoryAge;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function index($slug)
   {

       $age_id = Age::where('name', $slug)->first()->id;
       $categoryAges = CategoryAge::where('age_id', $age_id)->with('category')->get();
      
    
        return view('pages.categories', compact('categoryAges', 'slug'));
   }

}
