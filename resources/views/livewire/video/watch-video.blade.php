<div>
    @push('custom-css')
        <link href="https://vjs.zencdn.net/7.20.3/video-js.css" rel="stylesheet" />

    @endpush
   <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <video src="" controls preload="auto" class="video-js" data-setup="{}">
                <source src="{{asset('videos/' . $video->uid . '/' . $video->processed_file)}}" type="application/x-mpegURL">
                    <p class="vjs-no-js">
                        To view this video please enable JavaScript, and consider upgrading to a
                        web browser that
                        <a href="https://videojs.com/html5-video-support/" target="_blank"
                          >supports HTML5 video</a
                        >
                      </p>
            </video>
        </div>
    </div>
   </div>
   @push('scripts')
   <script src="https://vjs.zencdn.net/7.20.3/video.min.js"></script>
@endpush
</div>
