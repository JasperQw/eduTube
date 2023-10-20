<div class="h-100 w-100 d-flex justify-content-center align-items-start ">
  {{-- py-4 --}}
  <style>
    /* CSS */
    .button-50 {
      appearance: button;
      background-color: #000;
      background-image: none;
      border: 1px solid #000;
      width: 100%;
      border-radius: 4px;
      box-shadow: #fff 4px 4px 0 0, #000 4px 4px 0 1px;
      box-sizing: border-box;
      color: #fff;
      cursor: pointer;
      display: inline-block;
      font-family: ITCAvantGardeStd-Bk, Arial, sans-serif;
      font-weight: 400;
      line-height: 20px;
      margin: 0 5px 10px 0;
      overflow: visible;
      padding: 12px 40px;
      text-align: center;
      text-transform: none;
      touch-action: manipulation;
      user-select: none;
      -webkit-user-select: none;
      vertical-align: middle;
      white-space: nowrap;
    }

    .button-50:focus {
      text-decoration: none;
    }

    .button-50:hover {
      text-decoration: none;
    }

    .button-50:active {
      box-shadow: rgba(0, 0, 0, .125) 0 3px 5px inset;
      outline: 0;
    }

    .button-50:not([disabled]):active {
      box-shadow: #fff 2px 2px 0 0, #000 2px 2px 0 1px;
      transform: translate(2px, 2px);
    }

    @media (min-width: 768px) {
      .button-50 {
        padding: 12px 50px;
      }
    }




    /* CSS */
    .button-63 {
      align-items: center;
      background-image: linear-gradient(144deg, #AF40FF, #5B42F3 50%, #00DDEB);
      border: 0;
      border-radius: 8px;
      box-shadow: rgba(151, 65, 252, 0.2) 0 15px 30px -5px;
      box-sizing: border-box;
      color: #FFFFFF;
      display: flex;
      font-family: Phantomsans, sans-serif;
      font-size: 20px;
      justify-content: center;
      line-height: 1em;
      max-width: 100%;
      min-width: 140px;
      padding: 19px 24px;
      text-decoration: none;
      user-select: none;
      -webkit-user-select: none;
      touch-action: manipulation;
      white-space: nowrap;
      cursor: pointer;
    }

    .button-63:active,
    .button-63:hover {
      outline: 0;
    }

    @media (min-width: 768px) {
      .button-63 {
        font-size: 24px;
        min-width: 196px;
      }
    }

    .kids-bg {
      background-image: url('/children-drawing.jpg');
    }

    .glass {
      background-color: rgba(17, 25, 40, 0.5);
      backdrop-filter: blur(4.6px);
      -webkit-backdrop-filter: blur(4.6px);
    }

    .adult-bg {
      background-image: url('https://images.pexels.com/photos/4144101/pexels-photo-4144101.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');
      background-size: cover;
    }

    .select-type:before {
      content: "";
      background: linear-gradient(45deg,
          #ff0000,
          #ff7300,
          #fffb00,
          #48ff00,
          #00ffd5,
          #002bff,
          #7a00ff,
          #ff00c8,
          #ff0000);
      position: absolute;
      top: -2px;
      left: -2px;
      background-size: 400%;
      z-index: -1;
      filter: blur(5px);
      -webkit-filter: blur(5px);
      width: calc(100% + 4px);
      height: calc(100% + 4px);
      animation: glowing-button-85 20s linear infinite;
      transition: opacity 0.3s ease-in-out;
      border-radius: 10px;
    }

    @keyframes glowing-button-85 {
      0% {
        background-position: 0 0;
      }

      50% {
        background-position: 400% 0;
      }

      100% {
        background-position: 0 0;
      }
    }

  </style>


  <div class="w-100 h-100 d-flex bg-black ">
    <div class=" w-100 h-100 kids-bg">
      <div class="glass w-100 h-100 d-flex flex-column gap-3 justify-content-center align-items-center px-5">
        <div class="select-type card bg-light text-dark border-0 w-100 py-3 px-5 d-flex flex-column gap-5">
          <h3 class="card-title text-center pt-5">
            Children Playground
          </h3>
          <a role="button" href="{{ route('study-workplace-kindergarten')}}" class="button-63 w-100 mb-5" role="button">Here you go!</a>
        </div>
      </div>
    </div>
    <div class="w-100 h-100 bg-danger adult-bg">
      <div class="glass w-100 h-100">
        <div class="glass w-100 h-100 d-flex flex-column gap-3 justify-content-center align-items-center px-5">
          <div class="select-type card bg-dark text-white border-0 w-100 py-3 px-5 d-flex flex-column gap-5">
            <h3 class="card-title text-center pt-5">
              Study Workplace
            </h3>
            <a role="button" href="{{ route('study-workplace-primary-secondary')}}" class="button-63 w-100 mb-5" role="button">Enjoy your study!</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{--!! ASK WHAT EDUCATION LEVEL CONTENT TO ACCESS --}}
  {{-- <div class="mt-5 text-center d-flex flex-column gap-5">
    <h3>Select your education level</h3>
    <div class="d-flex gap-4">
      <a href="{{ route('study-workplace-kindergarten')}}" class="text-center link-light link-underline link-underline-opacity-0 button-50" role="button">Kindergarten</a>
  <a href="{{ route('study-workplace-primary-secondary')}}" class="text-center link-light link-underline link-underline-opacity-0 button-50" role="button">Primary / Secondary</a>
  <button class="button-50" role="button">Pre-U / University</button>
</div>
</div> --}}

</div>
