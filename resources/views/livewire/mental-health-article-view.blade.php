<div class="h-100 w-100 px-5 py-5 d-flex flex-column gap-4">
  <h1>{{$article->title}}</h1>


  <p>
    {!! nl2br(e($article->content)) !!}
  </p>

  @if(isset($article->likes->user_id) == false || (isset($article->likes->user_id) && $article->likes->user_id != Auth::user()->id))
  <button wire:click="like({{$article->id}})" class="bg-transparent border-0 d-flex gap-3 align-items-center ">
    <img src="{{ asset('like-icon.svg') }}" alt="like">
    <p class="p-0 m-0">{{$article->like}}</p>
  </button>
  @else
  <button class="bg-transparent border-0 d-flex gap-3 align-items-center " style="pointer-events: none;">
    <img src="{{ asset('like-icon-fill.svg') }}" alt="like">
    <p class="p-0 m-0">{{$article->like}}</p>
  </button>
  @endif
</div>
