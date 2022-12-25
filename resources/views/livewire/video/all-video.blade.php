<div>
    <div class="container">
        <div class="row justify-content-center text-center d-block">
            @if ($videos->count())

            <div class="col-md-12">
                @foreach ($videos as $video)
                    <div class="card my-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <a href="{{route('video.watch', $video)}}">
                                    <img src="{{URL::asset($video->thumbnail)}}" class="img-thumbnail" alt="">
                                </a>
                                </div>
                                <div class="col-md-3">
                                    <h5>{{$video->title}}</h5>
                                    <p class="text-truncate">{{$video->description}}</p>
                                </div>
                                <div class="col-md-2">
                                    {{$video->visibility}}
                                </div>
                                <div class="col-md-2">
                                    {{$video->created_at->format('d/m/y')}}
                                </div>
                                @if (auth()->user()->owns($video))
                                <div class="col-md-2">
                                    <a href="{{route('video.edit', ['channel' => auth()->user()->channel,
                                     'video' => $video->uid])}}" class="btn btn-light">Edit</a>
                                    <a wire:click.prevent="delete('{{$video->uid}}')" class="btn btn-danger">Delete</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
                {{$videos->links()}}
            @else
            <h1>No videos uploaded</h1>
            @endif
        </div>
    </div>
</div>
