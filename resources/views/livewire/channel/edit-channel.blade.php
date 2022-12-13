<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    @if ($channel->image)
        <img src="{{asset( 'images' . '/'. $channel->image)}}" alt="">
    @endif
    <form  wire:submit.prevent='update'>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" wire:model="channel.name">
        </div>
        @error('channel.name')
            <div class="mt-3 alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" wire:model="channel.slug">
        </div>
        @error('channel.slug')
            <div class="mt-3 alert alert-danger">{{$message}}</div>
        @enderror
        <div class="form-group">
            <label for="description">Description</label>
            <textarea cols="30" rows="10" class="form-control" wire:model="channel.description"></textarea>
        </div>

        @error('channel.description')
            <div class="mt-3 alert alert-danger">{{$message}}</div>
        @enderror


        <div class="form-group mt-3">
            <input type="file" wire:model="image">
        </div>
        <div class="form-group">
            @if ($image)
            Photo Preview:
            <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail">
        @endif
        </div>
        @error('image')
            <div class="mt-3 alert alert-danger">{{$message}}</div>
        @enderror


        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

        @if ($message = session('message'))
            <div class="alert alert-success mt-3">
                {{$message}}
            </div>
        @endif
    </form>
</div>
