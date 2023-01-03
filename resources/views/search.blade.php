@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-4">
        @foreach ($videos as $video)
        <div class="col-12">
            <a href="{{route('video.watch' , $video)}}" class="card-link">

                <div class="card-horizontal">
                    <div style="width:333px;">
                        @include('includes.videoThumbnail')

                    </div>
                        <div class="card-body" style="margin-left: 10px">
                            <h4 class="ml-3">{{$video->title}}</h4>
                            <p class="text-gray font-weight-bold"  >{{$video->views}} view .
                            {{$video->created_at->diffForHumans()}}</p>

                            <div class="d-flex align-items-center">
                                <img src="{{asset('/images/' . $video->channel->image)}}" height="40px"
                                class="rounded-circle" alt="">
                                <p style="margin-left: 10px" class="text-gray mt-4 font-weight-bold">{{$video->channel->name}}</p>
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
