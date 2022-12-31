<div>
    <div class="d-flex algin-items-center">
        <img style="height: 40px;" src="{{asset('/images/' . auth()->user()->channel->image)}}" alt="" class="rounded-img">
        <input type="text" wire:model="body" class="my-2 comment-form-control" placeholder="Add a public comment">
    </div>

    <div class="d-flex justify-content-end algin-items-center">
        @if ($body)
            <a href="" wire:click.prevent='resetForm'>Cancel</a>
            <a href="" class="mx-2 btn btn-secondary " wire:click.prevent='addComment'>COMMENT</a>
        @endif
    </div>
</div>
