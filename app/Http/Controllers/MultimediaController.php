<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MultimediaController extends Controller
{
    public function index($id)
    {
      
        $categories = Category::where('id', $id)->where('status', 1)->with('multimedias')->get();
        
        // Debugging: Check the multimedias for each category
        foreach ($categories as $category) {
            dd($category->multimedias);
        }

        return view('pages.categories', compact('categories'));
       
    }
}
