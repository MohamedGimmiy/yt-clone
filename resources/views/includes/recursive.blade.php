@foreach ($comments as $comment)

<div class="media my-3" x-data="{open: false}">
    <img class="mr-3 rounded-circle" src="{{asset('/images/'. $comment->user->channel->image)}}" alt="{{$comment->user->channel->name}}">
    <div class="media-body">
      <h5 class="mt-0">
        {{$comment->user->name}}
        <small class="text-muted" style="font-size: 14px">{{$comment->created_at->diffForHumans()}}</small>
    </h5>
      {{$comment->body}}
      @if ($comment->replies->count())
        <a href="" @click.prevent="open=!open">{{$comment->replies->count()}} replies</a>

        <div x-show="open">

            @include('includes.recursive', ['comments' => $comment->replies])
        </div>
      @endif
    </div>
  </div>
@endforeach
