<div>
    <h4>{{$video->AllcommentsCount()}} comments</h4>

    @foreach ($video->comments as $comment)

    <div class="media my-3">
        <img class="mr-3 rounded-circle" src="{{'/images/'. $comment->user->channel->image}}" alt="{{$comment->user->channel->name}}">
        <div class="media-body">
          <h5 class="mt-0">
            {{$comment->user->name}}
            <small class="text-muted" style="font-size: 14px">{{$comment->created_at->diffForHumans()}}</small>
        </h5>
          {{$comment->body}}
        </div>
      </div>
    @endforeach
</div>
