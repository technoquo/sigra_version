<?php

namespace App\Http\Controllers;

use App\Models\Instagram;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $instagrams = Instagram::where('status', 1)->orderBy('created_at', 'desc')->get();

        return view('home', compact('instagrams'));
               
    }
}
