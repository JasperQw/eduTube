<div class="w-100 h-100 d-flex justify-content-center align-items-start mt-5 px-5">
  <style>
    .video_size {
      width: 40rem;
      height: 25rem;
    }

  </style>
  <div class="h-100 d-flex flex-column  overflow-scroll " style="">
    <iframe class="video_size mb-5" allowfullscreen src="https://www.youtube.com/embed/{{$video->yt_code}}">
    </iframe>
    <div>
      <h3 class="mb-3 ">{{$video->title}}</h3>
      <p>{{$video->description}}</p>
    </div>
    @if(isset($video->likes->user_id) == false || (isset($video->likes->user_id) && $video->likes->user_id != Auth::user()->id))
    <button wire:click="like({{$video->id}})" class="bg-transparent border-0 d-flex gap-3 align-items-center mb-3 ">
      <img src="{{ asset('like-icon.svg') }}" alt="like">
      <p class="p-0 m-0">{{$video->like}}</p>
    </button>
    @else
    <button class="bg-transparent border-0 d-flex gap-3 align-items-center mb-3" style="pointer-events: none;">
      <img src="{{ asset('like-icon-fill.svg') }}" alt="like">
      <p class="p-0 m-0">{{$video->like}}</p>
    </button>
    @endif
  </div>
</div>
