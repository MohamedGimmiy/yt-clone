<div class="my-3">
    <div class="d-flex align-items-center justify-content-between">
        <div class="algin-items-center">
            <img src="{{asset('/images/' . $channel->image)}}" class="rounded-circle" alt="">
            <div class="ml-2">
                <h4>{{$channel->name}}</h4>
                <p class="gray-text text-sm">{{$channel->subscribers()}} subscribers</p>
            </div>
        </div>
        <div>
            <button wire:click.prevent='toggle' class="btn lg text-uppercase btn-secondary {{$userSubscribed ? 'sub-btn-active' : 'sub-btn'}}">
                {{$userSubscribed ? 'Subscribed' : 'Subscribe'}}
            </button>
        </div>
    </div>
</div>
