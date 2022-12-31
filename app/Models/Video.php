<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    // get any table i need (model binding)
    protected $guarded = [];
    public function getRouteKeyName()
    {
        return 'uid';
    }


    function getUploadedDateAttribute()
    {
        $d = new Carbon($this->created_at);
        return $d->toFormattedDateString();
    }

    public function getThumbnailAttribute(){
        if($this->thumbnail_image){

            return  '/videos/'  .$this->uid . '/' . $this->thumbnail_image;
        }
        return '/videos/'. 'default.png';
    }



    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class,'video_id');
    }

    public function dislikes()
    {
        return $this->hasMany(Dislike::class,'video_id');
    }

    public function didUserLikeVideo()
    {
        return $this->likes()->where('user_id' , auth()->id())->exists();
    }

    public function didUserDisLikeVideo()
    {
        return $this->dislikes()->where('user_id' , auth()->id())->exists();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('reply_id');
    }
    public function AllcommentsCount()
    {
        return $this->hasMany(Comment::class)->count();
    }



}
