<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use Livewire\Component;

class WatchVideo extends Component
{
    public $video;

    // catch viewed event and update views number
    protected $listeners =  ['VideoViewed' => 'countView'];
    public function mount(Video $video)
    {
        $this->video = $video;
    }
    public function render()
    {
        return view('livewire.video.watch-video')
        ->extends('layouts.app');
    }

    public function countView()
    {
        $this->video->update([
            'views' => $this->video->views + 1
        ]);
    }
}
