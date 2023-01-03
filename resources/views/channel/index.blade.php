@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid bg-primary">
    <div class="container">
        <h1 class="display-4">{{$channel->name}}</h1>
        <p class="lead">{{$channel->description}}</p>
    </div>
</div>
<div class="container">
    <div class="d-flex align-items-center">
        <img src="{{asset('/images/' . $channel->image)}}" class="rounded-circle mr-3" height="130px">
        <div>
            <h3>{{$channel->name}}</h3>
            <p>{{$channel->subscribers()}} Subscribers</p>

        </div>
    </div>
</div>
@endsection
