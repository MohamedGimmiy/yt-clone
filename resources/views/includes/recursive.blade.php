@foreach ($comments as $comment)

<div class="media my-3" x-data="{open: false, openReply:false}">
    <img class="mr-3 rounded-circle" src="{{asset('/images/'. $comment->user->channel->image)}}" alt="{{$comment->user->channel->name}}">
    <div class="media-body">
      <h5 class="mt-0">
        {{$comment->user->name}}
        <small class="text-muted" style="font-size: 14px">{{$comment->created_at->diffForHumans()}}</small>
    </h5>
      {{$comment->body}}

      <p class="text-muted" @click.prevent='openReply = !openReply'>
          <a href="">REPLY</a>
      </p>
    @auth
        <div class="my-2" x-show='openReply'>
            <livewire:comment.new-comment :col='$comment->id' :key='$comment->id . uniqid()' :video="$video" /></livewire:comment.new-comment>
        </div>
    @endauth

      @if ($comment->replies->count())
        <a href="" @click.prevent="open=!open">view {{$comment->replies->count()}} replies</a>
        <div x-show="open">

            @include('includes.recursive', ['comments' => $comment->replies])
        </div>
      @endif
    </div>
  </div>
@endforeach
