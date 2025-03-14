<?php

namespace App\Livewire;

use App\Models\Member;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Search extends Component
{
    public $search = '';
    public $results = [];

    public function updatedSearch()
    {

       if (!Auth::check()){
            $this->DisplaySearch();         
            
       } else {
        $member = Member::where('users_id', Auth::id())->first();
        if (is_array($member->videos_id) && count($member->videos_id) === 0) {
             $this->DisplaySearch();
          
        } else {
            if (!empty($this->search)) {
                $this->results = Video::where('name', 'like', '%' . $this->search . '%')
                    ->whereIn('type', ['publique', 'privé']) // Pass an array here
                    ->limit(5)
                    ->get();
            } else {
                $this->results = [];
            }
        }
       }      

    }

    public function DisplaySearch()
    {
        if (!empty($this->search)) {
            $this->results = Video::where('name', 'like', '%' . $this->search . '%')
                ->where('type','publique')
                ->limit(5)
                ->get();
        } else {
            $this->results = [];
        } 
    }

    public function render()
    {
        return view('livewire.search');
    }
}
