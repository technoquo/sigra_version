<?php

namespace App\Http\Controllers;

use App\Models\Boutique;
use Illuminate\Http\Request;

class BoutiqueController extends Controller
{    public function index()
    {

        $boutiques = Boutique::where('status', 1)->get();

        return view('pages.boutique', [
            'boutiques' => $boutiques
        ]);

        
    }
}
