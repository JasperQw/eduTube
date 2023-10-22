<div class="h-100 w-100 overflow-scroll">
  <style>
    .image-background {
      background-image: url('/mh-article-bg.jpeg');
      width: 100%;
      height: 36rem;
      background-repeat: no-repeat;
      background-size: cover;

      background-position-y: -25rem;
    }

    .avatar {
      border-radius: 100%;
      height: 3rem;
      width: 3rem;
      min-height: 3rem;
      min-width: 3rem;
      max-height: 3rem;
      max-width: 3rem;
    }

  </style>
  <div class="image-background"></div>

  <div class="h-100 w-100 pt-5 d-flex flex-column gap-4" style="padding-inline: 20rem;">

    <h1>{{$article->title}}</h1>

    <div class="d-flex justify-content-between align-content-center ">
      <div class="d-flex align-items-center gap-4">
        <a href="/user-profile/{{$article->user->id}}"><img class="avatar" src="{{ asset($article->user->profile_image) }}" alt="avatar"></a>
        <div class="d-flex flex-column ">
          <small class="m-0">Author</small>
          <p class="m-0">{{$article->user->name}}</p>
        </div>
      </div>
      <div class="d-flex flex-column justify-content-center align-content-end ">
        <small>Published at: </small>
        <p class="m-0">{{$article->created_at}}</p>
      </div>
    </div>
    <q class="fst-italic ">
      {{$article->description}}
    </q>
    <hr>
    <div class="pb-5">
      <p>
        {!! nl2br(e($article->content)) !!}
      </p>
      @if(isset($article->likes->user_id) == false || (isset($article->likes->user_id) && $article->likes->user_id != Auth::user()->id))
      <button wire:click="like({{$article->id}})" class="bg-transparent border-0 d-flex gap-3 align-items-center pb-5">
        <img src="{{ asset('like-icon.svg') }}" alt="like">
        <p class="p-0 m-0">{{$article->like}}</p>
      </button>
      @else
      <button class="bg-transparent border-0 d-flex gap-3 align-items-center pb-5" style="pointer-events: none;">
        <img src="{{ asset('like-icon-fill.svg') }}" alt="like">
        <p class="p-0 m-0">{{$article->like}}</p>
      </button>
      @endif
    </div>
  </div>

</div>
