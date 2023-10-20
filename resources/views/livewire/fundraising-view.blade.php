<div class="w-100 h-100 ">
  <style>
    /* CSS */
    .button-34 {
      background: #f0605d;
      border-radius: 999px;
      box-shadow: #ef7c7a 0 10px 20px -10px;
      box-sizing: border-box;
      color: #FFFFFF;
      cursor: pointer;
      font-family: Inter, Helvetica, "Apple Color Emoji", "Segoe UI Emoji", NotoColorEmoji, "Noto Color Emoji", "Segoe UI Symbol", "Android Emoji", EmojiSymbols, -apple-system, system-ui, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", sans-serif;
      font-size: 16px;
      font-weight: 700;
      line-height: 24px;
      opacity: 1;
      outline: 0 solid transparent;
      padding: 8px 18px;
      user-select: none;
      -webkit-user-select: none;
      touch-action: manipulation;
      width: fit-content;
      word-break: break-word;
      border: 0;
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
  <div class="w-100 h-100 d-flex justify-content-center align-items-center " style='padding-bottom: 3.5rem;'>
    <div class="nav-shadow rounded-4 p-4" style="width: 60rem; height: 40rem;">
      <div class="w-100 d-flex justify-content-end ">
        <button class="button-34" role="button">Connect Wallet</button>
      </div>
      <div class="mt-4 d-flex flex-column gap-3">
        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
          <div class="progress-bar progrssbarAnimation" style="width: 10%;"></div>
        </div>
        <p class="fs-5">Target: <span class="text-warning ">1000000</span> / 10000000</p>
      </div>

      <div class="w-100 d-flex flex-column justify-content-center align-items-center ">
        <div class="d-flex gap-4 align-items-center ">
          <p class="m-0 fs-5">Amount: </p>
          <div class="position-relative ">
            <input class="py-2 px-3 rounded-3" style="width: 25rem;" type="text">
            <div style="right: 15px;" class="position-absolute top-0 bottom-0  d-flex align-items-center ">
              <p class="m-0">ETT</p>
            </div>
            <p style="bottom: -1.5rem;" class="m-0 position-absolute text-danger ">ETT stand for EduTube Token, 1 EDT = 1 USD</p>
          </div>
        </div>
        <button class="button-34 mt-5 px-5" role="button">Submit</button>
      </div>
      <div class="w-100 overflow-scroll mt-4" style="height: 18rem;">
        <table class="table table-hover">
          <thead class="sticky-top ">
            <tr class="text-center">
              <th>#</th>
              <th>Transaction Hash</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>
            @forelse($records as $record)
            <tr class="text-center">
              <td>{{$loop->iteration}}</td>
              <td><a href="https://testnet.bscscan.com/tx/{{$record->txhash}}">{{$record->txhash}}</a></td>
              <td>{{$record->amount}}</td>
            </tr>

            @empty
            <tr>
              <td colspan="3">Empty!</td>
            </tr>
            @endforelse

          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>
