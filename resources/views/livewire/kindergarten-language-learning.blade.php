<div class="w-100 h-100 pt-4">

  <style>
    .section-1 {
      height: 100%;
      width: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      scroll-snap-align: center;
    }

    .select-type {
      position: absolute;
      top: -30px;
      right: 0px;
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

    .menu-side {
      height: 100%;
      width: 100%;
      padding-bottom: 4.5rem;
      padding-inline: 1rem;

    }

    .menu-side-inside {
      height: 100%;
      width: 100%;
      border-radius: 30px;
      background: rgba(138, 234, 167, 0.19);
      border-radius: 16px;
      box-shadow: 0 4px 30px rgba(194, 206, 152, 0.1);
      backdrop-filter: blur(8.4px);
      -webkit-backdrop-filter: blur(8.4px);
      display: flex;
      flex-direction: column;
      gap: 4rem;
      justify-content: center;
      align-items: center;
    }

    .background {
      background-image: url('/children-drawing.jpg');
      height: 100%;
      width: 100%;
      border-radius: 30px;
    }


    /* CSS */
    .button-52 {
      font-size: 16px;
      font-weight: 200;
      letter-spacing: 1px;
      padding: 13px 20px 13px;
      outline: 0;
      border: 1px solid black;
      cursor: pointer;
      position: relative;
      background-color: rgba(0, 0, 0, 0);
      user-select: none;
      -webkit-user-select: none;
      touch-action: manipulation;
    }

    .button-52:after {
      content: "";
      background-color: #ffe54c;
      width: 100%;
      z-index: -1;
      position: absolute;
      height: 100%;
      top: 7px;
      left: 7px;
      transition: 0.2s;
    }

    .button-52:hover:after {
      top: 0px;
      left: 0px;
    }

    @media (min-width: 768px) {
      .button-52 {
        padding: 13px 50px 13px;
      }
    }

    .title {
      font-size: 30px;
      font-weight: 200;
      letter-spacing: 1px;
      width: 100%;
      text-align: center;
      margin-bottom: 2rem;
    }

  </style>
  <div class="menu-side position-relative">
    <div class="background">
      <div class="menu-side-inside py-5 px-3 z-3 ">

        <div class="w-100 h-100 position-relative">


          <div class="select-type">
            <select wire:model.live="type" class="form-select" aria-label="Default select example">
              <option selected value="">--Select--</option>
              <option value="alphabet">Alphabet</option>
              <option value="vocab">Vocabulary</option>
            </select>
          </div>

          <div class="overflow-scroll w-100 h-100" style="scroll-snap-type: y mandatory;">
            @foreach ($videos as $video)
            <section class="section-1">
              <div class="w-100 d-flex justify-content-center ">
                <video src="{{ asset($video->link) }}" class="rounded-4 bg-black" width="1000" height="550" controls>
                </video>
              </div>
            </section>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
