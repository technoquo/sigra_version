<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\Instagram;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $instagrams = Instagram::where('status', 1)->orderBy('created_at', 'desc')->get();

        return view('home', compact('instagrams'));
               
    }

    public function info($slug)
    {

        $mission = Mission::where('slug', $slug)->firstOrFail();


        return view('info', [
            'mission' => $mission
        ]);
    }

}
