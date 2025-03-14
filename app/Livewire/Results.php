<?php

namespace App\Livewire;

use App\Models\Member;
use App\Models\Video;
use Livewire\Component;

class Results extends Component
{
    public $slug;
    public $members;
    public $member;
    public $video;

    public function render()
    {

        $this->video = Video::where('slug', $this->slug)->firstOrFail();



        $id = (string) $this->video->id;



            $this->members = Member::where('subscriptions_id', 1)
                ->where('status', 1)
                ->where('users_id', auth()->user()->id)
                ->whereJsonContains('videos_id', $id)
                ->get();



            if ($this->members->count() > 0) {
                $this->member = true;
            } else {
                $this->member = false;
            }

        return view('livewire.results')->layout('layouts.app');
    }
}
