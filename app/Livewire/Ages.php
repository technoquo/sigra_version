<?php

namespace App\Livewire;

use App\Models\Age;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class Ages extends Component
{

    public $ages;

    public $categories;
    public $pocorns;

    public function mount() {
        $this->ages = Age::where('status', 1)->get();
        
        $this->pocorns = Category::where('type','tous')->get();

        $this->categories = Category::where('status', 1)->get();
        
        

    }

    public function render()
    {
        return view('livewire.ages');
    }
}