<div @if ($video->processing_percentage <100)
    wire:poll
@endif >
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{asset($this->video->thumbnail)}}" class="img-thumbnail" alt="">
                    </div>
                </div>
                <div class="col-md-8">
                    <p>{{$this->video->processing_percentage}}%</p>
                <form wire:submit.prevent='update'>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" wire:model="video.title">
                    </div>
                    @error('video.title')
                    <div class="mt-3 alert alert-danger">{{$message}}</div>
                    @enderror

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea cols="30" rows="10" class="form-control" wire:model="video.description"></textarea>
                    </div>

                    @error('video.description')
                    <div class="mt-3 alert alert-danger">{{$message}}</div>
                    @enderror


                    <div class="form-group">
                        <label for="visibility">Visibility</label>
                        <select wire:model='video.visibility' class="form-control">
                            <option value="private">Private</option>
                            <option value="public">Public</option>
                            <option value="unlisted">Unlisted</option>
                        </select>
                    </div>

                    @error('video.visibility')
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
        </div>
    </div>
</div>
