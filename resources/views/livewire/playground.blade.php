<div class="w-100 h-100 d-flex py-4">
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
      padding: 18px 28px;
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

    .menu-side {
      height: 100%;
      width: 20rem;
      padding-bottom: 4.5rem;
      padding-inline: 1rem;
    }

    .content {
      height: 100%;
      flex: 1;
      padding-bottom: 5.5rem;
      padding-inline: 1rem;
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }

    .content-inside {
      height: 100%;
      width: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      /* padding-bottom: 2.5rem; */
      /* border-radius: 30px; */
      /* border: solid 1px; */
    }

    .content-nav {
      height: 5rem;
      width: 100%;
      /* border: solid 1px; */
      border-radius: 20px;
      display: flex;
      justify-content: end;
      align-items: center;
    }

    .menu-side-inside {
      height: 100%;
      width: 100%;
      border-radius: 30px;
      /* border: solid 1px; */
      padding-block: 20px;
      box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
    }

    .image-sizing {
      width: 20rem;
      height: 15rem;
    }

    .selected-route {
      background-color: rgba(0, 0, 0, 0.15);

    }

    .game-image {
      height: 10rem;
      width: 10rem;
      min-height: 10rem;
      min-width: 10rem;
      max-height: 10rem;
      max-width: 10rem;
    }

  </style>

  <div class="menu-side">
    <div class="menu-side-inside overflow-hidden">
      <ul class="list-group ">
        <li class="list-group-item border-0">
          <a role="button" href="{{ route('mental-health-workplace') }}" class="btn w-100 text-start">Articles</a>
        </li>
        <li class="list-group-item border-0">
          <a role="button" href="{{ route('counselling-section') }}" class="btn w-100 text-start">Counselling</a>
        </li>
        <li class="list-group-item border-0">
          <a role="button" href="{{ route('stress-detector') }}" class="btn w-100 text-start">Stress Detector</a>
        </li>
        <li class="list-group-item border-0">
          <a role="button" href="{{ route('playground') }}" class="btn w-100 text-start selected-route">Playground</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="content">

    <div class="content-inside">
      <div class="d-flex flex-grow-1 flex-column gap-5 h-100 overflow-scroll">
        @forelse($games as $game)
        <div class="d-flex gap-4 px-3 mx-3 border border-2 border-opacity-25 border-secondary py-4 px-5 rounded-4">
          <img src="{{asset($game->image_url)}}" class="game-image" alt="game image">
          <div class="d-flex flex-column  w-100">
            <div class="h-100 w-100">
              <p class=" fs-3 ">{{$game->name}}</p>
              <p>{{$game->description}}</p>
            </div>
            <div class="d-flex gap-3 justify-content-between align-items-center ">
              @if(isset($game->likes->user_id) == false || (isset($game->likes->user_id) && $game->likes->user_id != Auth::user()->id))
              <button wire:click="like({{$game->id}})" class="bg-transparent border-0 d-flex gap-3 align-items-center ">
                <img src="{{ asset('like-icon.svg') }}" alt="like">
                <p class="p-0 m-0">{{$game->like}}</p>
              </button>
              @else
              <button class="bg-transparent border-0 d-flex gap-3 align-items-center " style="pointer-events: none;">
                <img src="{{ asset('like-icon-fill.svg') }}" alt="like">
                <p class="p-0 m-0">{{$game->like}}</p>
              </button>
              @endif
              <a role="button" href="{{$game->link}}" target="_blank" class="button-27">Play!</a>
            </div>

          </div>

        </div>
        @empty
        <div class="h-100 w-100 d-flex justify-content-center align-items-center ">
          <h1>Empty!</h1>
        </div>
        @endforelse



      </div>

    </div>

  </div>
