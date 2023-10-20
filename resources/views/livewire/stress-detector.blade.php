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

    .avatar {
      border-radius: 100%;
      height: 3rem;
      width: 3rem;
      min-height: 3rem;
      min-width: 3rem;
      max-height: 3rem;
      max-width: 3rem;
    }

    .add-btn {
      position: fixed;
      width: 3rem;
      height: 3rem;
      background-color: black;
      border-radius: 100%;
      border: none;
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
      font-size: 25px;
      font-weight: 600;
      bottom: 2rem;
      right: 2rem;
      z-index: 100;
    }

    .result {
      background: linear-gradient(110.5deg, rgba(248, 196, 249, 0.66) 22.8%, rgba(253, 122, 4, 0.15) 64.6%);


    }

    .glass {
      background: radial-gradient(328px at 2.9% 15%, rgb(191, 224, 251) 0%, rgb(232, 233, 251) 25.8%, rgb(252, 239, 250) 50.8%, rgb(234, 251, 251) 77.6%, rgb(240, 251, 244) 100.7%);
    }


    .nav-shadow {
      box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
    }

    @keyframes gradient {
      0% {
        background-position: 0% 50%;

      }

      50% {
        background-position: 100% 50%;
      }

      100% {
        background-position: 0% 50%;
      }
    }

    @keyframes widthFlow {
      0% {
        width: 0%;
      }
    }

    .progrssbarAnimation {
      /* animation: progressBar 3s ease-in-out 0ms infinite; */
      background: linear-gradient(-45deg, #23a6d5, #23d5ab, #f3b878, #e87f4f);
      background-size: 400% 400%;
      animation: gradient 5s ease infinite, widthFlow 2s ease;
    }

  </style>
  @if(Auth::user()->role == "counsellor")
  <button class="add-btn" data-bs-toggle="modal" data-bs-target="#counsellingModal">
    <p class="p-0 m-0">+</p>
  </button>
  @endif
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
          <a role="button" href="{{ route('stress-detector') }}" class="btn w-100 text-start selected-route">Stress Detector</a>
        </li>
        <li class="list-group-item border-0">
          <a role="button" href="{{ route('playground') }}" class="btn w-100 text-start">Playground</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="content">

    <div class="content-inside">
      <div class="d-flex flex-grow-1 gap-5 h-100 overflow-scroll justify-content-center align-items-center ">


        <div class="nav-shadow glass card rounded-4 py-4" style="width: 30rem; height: 35rem;">
          <h3 class="w-100 text-center fw-bolder text-decoration-underline link-offset-2 mt-4">Stress Detector</h3>
          <div class="h-100 w-100 d-flex flex-column justify-content-center align-items-center gap-5">
            <div class="form-floating mb-3 w-100" style="max-width: 25rem;">
              <input wire:model="myText" type="text" class="form-control" id="text_input" placeholder="text">
              <label for="text_input">Text Inputs</label>
            </div>
            <button wire:click="predict" class="button-27">Test</button>
          </div>
        </div>

        <div class="nav-shadow result card rounded-4 py-4" style="width: 30rem; height: 35rem;">
          <h3 class="w-100 text-center fw-bolder text-decoration-underline link-offset-2 mt-4">Result</h3>
          <div class="h-100 w-100 d-flex flex-column justify-content-center align-items-center gap-5">
            <div class="mb-3 w-100 d-flex flex-column  align-items-center " style="max-width: 25rem;">
              @if($result == "no_stress")
              <div class="alert alert-success w-100" role="alert">
                Congratulation! You are not stressed!
              </div>
              @elseif ($result == 'stress')
              <div class="alert alert-danger w-100" role="alert">
                Hey there! It seems like your stress levels might be on the rise.
              </div>
              @endif
              <div class="d-flex flex-column gap-3 w-100 ">
                <p class="m-0">Non-stress Score:</p>
                <div class="progress w-100 " role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar progrssbarAnimation" style="width: {{$score_no_stress}}%"></div>
                </div>

                <p class="m-0">Stress Score:</p>
                <div class="progress w-100" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar progrssbarAnimation" style="width: {{$score_stress}}%"></div>
                </div>
              </div>

              {{-- @if($result == "stress")
              <p class="text-start w-100">Hey there! Our stress detector has picked up on some signs, but don't worry – we've got your back. <br /><br /> You have two fantastic options to unwind: dive into our mini games for a fun break, or let soothing music be your companion. <br /><br /> Choose what feels right for you, take a moment for yourself, and let the stress melt away. Your well-being matters, and we're here to make sure you find the relaxation you need!</p>
              @elseif ($result == "no_stress")
              <p class="text-start w-100">Great news! Our stress detector has analyzed your input, and it looks like you're doing fantastic—no signs of stress detected. <br /><br /> Keep up the positive vibes! If you ever feel like taking a break for some fun or relaxation, our mini games and music options are still here for you. <br /><br /> Your well-being is our priority, whether you're winding down or enjoying a stress-free moment.</p>
              @endif --}}



            </div>
            <div class="d-flex gap-4">
              <a role="button" href="https://music.youtube.com/" target="_blank" class="button-27">Music</a>
              <a role="button" href="{{ route('playground') }}" class="button-27">Game</a>
            </div>

          </div>
        </div>

        {{-- <input type="text" wire:model.live="myText">
        <button class="btn btn-primary " wire:click="predict">Submit</button> --}}


      </div>
      {{-- <div class="mt-4 w-100 d-flex justify-content-center ">
            {{ $ccs->links('vendor.livewire.bootstrap') }}
    </div> --}}
  </div>

</div>
