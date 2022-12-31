<div>
    <h4>{{$video->AllcommentsCount()}} comments</h4>
    @include('includes.recursive', ['comments' => $video->comments])
</div>
