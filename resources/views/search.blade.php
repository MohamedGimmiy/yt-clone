@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-4">
        @foreach ($videos as $video)
        <div class="col-12">
            <a href="{{route('video.watch' , $video)}}" class="card-link">

                <div class="card-horizontal">
                    <div>
                        <img class="card-img-top" src="{{asset($video->thumbnail)}}" alt="Card image cap"
                        style="height: 100%; width:333px">
                    </div>
                        <div class="card-body">
                            <h4 class="ml-3">{{$video->title}}</h4>
                            <p class="text-gray font-weight-bold"  >{{$video->views}} view .
                            {{$video->created_at->diffForHumans()}}</p>

                            <div class="d-flex align-items-center">
                                <img src="{{asset('/images/' . $video->channel->image)}}" height="40px"
                                class="rounded-circle" alt="">
                                <p class="text-gray mt-4 font-weight-bold">{{$video->channel->name}}</p>
                                <h4 class="ml-3">{{$video->title}}</h4>
                            </div>
                            <p class="text-truncate">{{$video->description}}</p>
                        </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
