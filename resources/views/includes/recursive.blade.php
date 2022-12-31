@foreach ($comments as $comment)

<div class="media my-3">
    <img class="mr-3 rounded-circle" src="{{asset('/images/'. $comment->user->channel->image)}}" alt="{{$comment->user->channel->name}}">
    <div class="media-body">
      <h5 class="mt-0">
        {{$comment->user->name}}
        <small class="text-muted" style="font-size: 14px">{{$comment->created_at->diffForHumans()}}</small>
    </h5>
      {{$comment->body}}
      @if ($comment->replies->count())
        <a href="">{{$comment->replies->count()}}replies</a>
        @include('includes.recursive', ['comments' => $comment->replies])
      @endif
    </div>
  </div>
@endforeach
