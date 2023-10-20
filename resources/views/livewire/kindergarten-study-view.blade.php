<div class="w-100 h-100 pt-4">

  <style>
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


        <h1 class="title">
          Kids, start your journey!
        </h1>
        <ul class="list-group ">
          <li class="list-group mb-5">
            <a href="{{ route('kindergarten-learning') }}" class="text-center link-dark link-underline link-underline-opacity-0  button-52" role="button">Language Learning</a>
          </li>
          <li class="list-group mb-5">
            <a href="{{ route('kindergarten-curiccular') }}" class="text-center link-dark link-underline link-underline-opacity-0  button-52" role="button">External Extra Curiccular Learning</a>
          </li>
          <li class="list-group mb-5">
            <a href="{{ route('kindergarten-interactive') }}" class="text-center link-dark link-underline link-underline-opacity-0  button-52" role="button">Interactive Playground</a>

          </li>
        </ul>





      </div>
    </div>



  </div>
</div>
