<div class="w-100 h-100 d-flex justify-content-center align-items-start mt-5 px-5 overflow-scroll" style="padding-bottom: 10rem;">
  <style>
    /* CSS */
    .button-27 {
      width: 12.5rem;
      appearance: none;
      background-color: #000000;
      border: 2px solid #1A1A1A;
      border-radius: 15px;
      box-sizing: border-box;
      color: #FFFFFF;
      cursor: pointer;
      display: inline-block;
      font-family: Roobert, -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
      font-size: 16px;
      font-weight: 600;
      line-height: normal;
      margin: 0;
      min-height: 30px;
      min-width: 0;
      outline: none;
      padding: 12px 24px;
      text-align: center;
      text-decoration: none;
      transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
      user-select: none;
      -webkit-user-select: none;
      touch-action: manipulation;

      will-change: transform;
    }

    .button-27:disabled {
      pointer-events: none;
    }

    .button-27:hover {
      box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
      transform: translateY(-2px);
    }

    .button-27:active {
      box-shadow: none;
      transform: translateY(0);
    }

  </style>

  <div class="h-100 d-flex gap-4">

    @if($answer == false)
    <embed class="h-100" style="min-width: 40rem;" name="plugin" src="{{asset($note->paper_url)}}" type="application/pdf">
    @else
    @if(isset($note->answer_url) == true)
    <embed class="h-100" style="min-width: 40rem;" name="plugin" src="{{asset($note->answer_url)}}" type="application/pdf">
    @else
    <div class="h-100 bg-black rounded-3 d-flex justify-content-center align-items-center " style="min-width: 40rem;" name="plugin">
      <h3 class="p-0 m-0 text-white">No Answer!</h3>
    </div>
    @endif

    @endif
    <div class="d-flex flex-column justify-content-center ">
      <h3 class="mb-3">{{$note->title}}</h3>
      <p>{{$note->description}}</p>
      @if(isset($note->likes->user_id) == false || (isset($note->likes->user_id) && $note->likes->user_id != Auth::user()->id))
      <button wire:click="like({{$note->id}})" class="bg-transparent border-0 d-flex gap-3 align-items-center mb-3 ">
        <img src="{{ asset('like-icon.svg') }}" alt="like">
        <p class="p-0 m-0">{{$note->like}}</p>
      </button>
      @else
      <button class="bg-transparent border-0 d-flex gap-3 align-items-center mb-3" style="pointer-events: none;">
        <img src="{{ asset('like-icon-fill.svg') }}" alt="like">
        <p class="p-0 m-0">{{$note->like}}</p>
      </button>
      @endif

      <button wire:click="changeAnswerView" class="button-27">@if($answer == false) Show @else Hide @endif Answer</button>


    </div>

  </div>
</div>
