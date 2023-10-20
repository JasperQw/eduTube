<div class="w-100 h-100 d-flex justify-content-center align-items-start mt-5 px-5 overflow-scroll" style="padding-bottom: 10rem;">
  <div class="h-100 d-flex gap-4">
    <embed class="h-100" style="min-width: 40rem;" name="plugin" src="{{asset($note->note_url)}}" type="application/pdf">
    <div class="d-flex flex-column justify-content-center ">
      <h3 class="mb-3">{{$note->title}}</h3>
      <p>{{$note->description}}</p>
      <div class="d-flex justify-content-between align-items-center ">
        <div class="d-flex gap-5 align-items-end h-100">
          @if(isset($note->likes->user_id) == false || (isset($note->likes->user_id) && $note->likes->user_id != Auth::user()->id))
          <button wire:click="like({{$note->id}})" class="bg-transparent border-0 d-flex gap-3 align-items-center ">
            <img src="{{ asset('like-icon.svg') }}" alt="like">
            <p class="p-0 m-0">{{$note->like}}</p>
          </button>
          @else
          <button class="bg-transparent border-0 d-flex gap-3 align-items-center" style="pointer-events: none;">
            <img src="{{ asset('like-icon-fill.svg') }}" alt="like">
            <p class="p-0 m-0">{{$note->like}}</p>
          </button>
          @endif

          @if(isset($note->collects->user_id) == false || (isset($note->collects->user_id) && $note->collects->user_id != Auth::user()->id))
          <button wire:click="collect({{$note->id}})" class="bg-transparent border-0 d-flex gap-3 align-items-center ">
            <img src="{{ asset('collect.svg') }}" alt="like">
            <p class="p-0 m-0">Collect</p>
          </button>
          @else
          <button style="pointer-events: none;" class="bg-transparent border-0 d-flex gap-3 align-items-center ">
            <img src="{{ asset('collect.svg') }}" alt="like">
            <p class="p-0 m-0">Collected!</p>
          </button>
          @endif

        </div>
      </div>

    </div>
  </div>
