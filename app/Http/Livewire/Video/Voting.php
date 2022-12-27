<?php

namespace App\Http\Livewire\Video;

use App\Models\Dislike;
use App\Models\Like;
use App\Models\Video;
use Livewire\Component;

class Voting extends Component
{
    protected $listeners = ['load_values' => '$refresh'];

    public $video;
    public $likes;
    public $dislikes;
    public $likeActive;
    public $dislikeActive;

    public function mount(Video $video)
    {
        $this->video = $video;
        $this->checkIfLiked();
        $this->checkIfDisLiked();
    }

    public function render()
    {
        $this->likes = $this->video->likes()->count();
        $this->dislikes = $this->video->dislikes()->count();
        return view('livewire.video.voting')
        ->extends('layouts.app');
    }
    public function checkIfLiked()
    {
        $this->video->didUserLikeVideo() ? $this->likeActive = true: $this->likeActive = false;
    }
    public function checkIfDisLiked()
    {
        $this->video->didUserDisLikeVideo() ? $this->dislikeActive = true: $this->dislikeActive = false;
    }

    public function like()
    {
        if($this->video->didUserLikeVideo()){
            //remove the count
            Like::where('user_id', auth()->id())->where('video_id', $this->video->id)->delete();
            $this->likeActive = false;
        }
        else{
            $this->video->likes()->create([
                'user_id' => auth()->id()
            ]);
            $this->likeActive = true;
        }
        $this->emit('load_values');
    }

    public function dislike()
    {
        // check if user disliked the video
        if($this->video->didUserDisLikeVideo()){
            //remove the count
            Dislike::where('user_id', auth()->id())->where('video_id', $this->video->id)->delete();
            $this->dislikeActive = false;
        }
        else{
            $this->video->dislikes()->create([
                'user_id' => auth()->id()
            ]);
            $this->dislikeActive = true;
        }
        $this->emit('load_values');
    }
}
