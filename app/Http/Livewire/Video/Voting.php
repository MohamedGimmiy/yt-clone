<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use Livewire\Component;

class Voting extends Component
{
    public $video;
    public $likes;
    public $dislikes;
    public $likeActive;
    public $dislikeActive;

    public function mount(Video $video)
    {
        $this->video = $video;
    }

    public function render()
    {
        return view('livewire.video.voting')
        ->extends('layouts.app');
    }

    public function like()
    {
        // check if user liked the video
        $this->video->likes()->create([
            'user_id' => auth()->id()
        ]);
    }

    public function dislike()
    {
        // check if user disliked the video
        $this->video->dislikes()->create([
            'user_id' => auth()->id()
        ]);
    }
}
