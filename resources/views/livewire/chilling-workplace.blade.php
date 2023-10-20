<div class="px-5 h-100 overflow-scroll" style="padding-bottom: 5rem;">

  <style>
    /* CSS */
    .button-64 {
      align-items: center;
      background-image: linear-gradient(144deg, #AF40FF, #5B42F3 50%, #00DDEB);
      border: 0;
      border-radius: 8px;
      box-shadow: rgba(151, 65, 252, 0.2) 0 15px 30px -5px;
      box-sizing: border-box;
      color: #FFFFFF;
      display: flex;
      font-family: Phantomsans, sans-serif;
      font-size: 16px;
      justify-content: center;
      line-height: 1em;
      max-width: 100%;
      min-width: 140px;
      padding: 3px;
      text-decoration: none;
      user-select: none;
      -webkit-user-select: none;
      touch-action: manipulation;
      white-space: nowrap;
      cursor: pointer;
    }

    .button-64:active,
    .button-64:hover {
      outline: 0;
    }

    .button-64 span {
      background-color: rgb(5, 6, 45);
      padding: 10px 24px;
      border-radius: 6px;
      width: 100%;
      height: 100%;
      transition: 300ms;
    }

    .button-64:hover span {
      background: none;
    }

    @media (min-width: 768px) {
      .button-64 {
        font-size: 16px;
        min-width: 196px;
      }
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

    .shadow-div {
      box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
    }


    .pulse {
      animation: pulse-animation 2s infinite;
    }

    @keyframes pulse-animation {
      0% {
        box-shadow: 0 0 0 0px rgba(0, 0, 0, 0.2);
      }

      100% {
        box-shadow: 0 0 0 100px rgba(0, 0, 0, 0);
      }
    }

    .glassmorphism {
      backdrop-filter: blur(3.5px);
      -webkit-backdrop-filter: blur(3.5px);
    }

    .image-sizing {
      width: 20rem;
      height: 15rem;
    }

  </style>
  <div class="w-100 border border-2 border-secondary border-opacity-25 px-5 py-3 rounded-3 my-4">
    <h3 class="w-100 text-center mb-4">Check-in Progress</h3>
    <div class="progress mb-4" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
      <div class="progress-bar position-relative progrssbarAnimation" style="width: calc(14.28% * {{$checkedin}})">
      </div>
    </div>

    <div class="w-100 d-flex justify-content-center mb-4 ">
      @if($checked == false)
      <button wire:click="checkin" class="button-64" role="button"><span class="text">Check-In</span></button>
      @elseif ($checkedin == 7)
      <button wire:click="getReward" onclick="claimPoints()" class="button-64" role="button"><span class="text">Claim Reward!</span></button>
      @else
      <button class="button-64" role="button"><span class="text" style="background: none;">Checked-In!</span></button>
      @endif
    </div>
    <p class="w-100 text-center mb-4">Continuously check-in 7 days for points reward!</p>
  </div>

  <div class="w-100 border border-2 border-secondary border-opacity-25 px-5 py-3 rounded-3">
    <h1 class="w-100 text-center mb-5 fw-bolder ">Daily Digest</h1>
    <div class="d-flex gap-3">
      <img class="image-sizing" src="https://www.stcharleshealthcare.org/sites/default/files/Featured%20Images/Blog/phone-scammer-blog_0.jpg" alt="daily digest">
      <div>
        <p style="text-align: justify;">A recent study conducted by the Global Anti-Scam Alliance (GASA) and ScamAdviser revealed alarming global trends in scams, estimating that scammers amassed a staggering $1.02 trillion between August 2022 and August 2023. The study, based on a survey of 49,459 individuals from 43 countries, highlighted that Singaporeans faced the highest average losses at $4,031, followed by Switzerland and Austria. GASA's managing director, Jorij Abraham, stressed the need for infrastructural measures, such as blocking scam sites, to enhance consumer protection, pointing out the increasing sophistication of scams, particularly in online shopping, identity theft, and investments. Abraham also noted that official figures from law enforcement agencies only represent about 7% of all scams, highlighting the limitations in calculating losses. In Singapore, where victims lost $660.7 million in 2022, Dr. Ng Li Sa from the Ministry of Home Affairs emphasized the international nature of the issue, with perpetrators primarily operating from abroad, underscoring the importance of global collaboration for effective law implementation and fund recovery. GASA, fostering collaboration among policymakers, law enforcement, and cybersecurity entities, collaborates with ScamAdviser to identify scam websites.</p>
        <p class="fw-bolder ">More details: <a href="https://www.hindustantimes.com/world-news/scammers-amass-1-02-trillion-globally-singapore-lost-the-most-report-101697794281576.html">https://www.hindustantimes.com/world-news/scammers-amass-1-02-trillion-globally-singapore-lost-the-most-report-101697794281576.html</a></p>
      </div>
    </div>

  </div>

  <audio loop id="rain-audio" class="d-none">
    <source src="{{ asset('raining-audio.mp3') }}" type="audio/mpeg">
  </audio>
  <div class="w-100 h-100 rounded-3 pt-4">
    <div class="w-100 h-100 rounded-3 shadow-div d-flex justify-content-center align-items-center position-relative overflow-hidden">
      <video class="position-absolute top-0 bottom-0 start-0 end-0 w-100" src="{{ asset('raining.mp4') }}" muted autoplay loop></video>
      <div wire:ignore class="w-100 h-100 glassmorphism rounded-3 shadow-div d-flex flex-column gap-5 justify-content-center align-items-center position-relative">
        <button onclick="startCountdown()" class="rounded-circle shadow-div pulse border-0 text-white " style="width: 25rem; height: 25rem; background-color:rgba(60, 64, 67, 0.7);">
          <p id="start">Start</p>
          <h1><span id="minute">25</span>:<span id="seconds">00</span></h1>
        </button>
        <button onclick="reset()" class="button-64" role="button"><span class="text">Reset</span></button>
      </div>

    </div>
  </div>

  <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <img src="..." class="rounded me-2" alt="...">
        <strong class="me-auto">Bootstrap</strong>
        <small>11 mins ago</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Hello, world! This is a toast message.
      </div>
    </div>
  </div>

  <script>
    async function claimPoints() {
      await Swal.fire({
        title: "Congratulation! You get 10 points!"
        , icon: "success"
        , timer: 2000
        , showCancelButton: true
      });
    }
    let start = document.getElementById('start');
    let pause = true;
    let rain_audio = document.getElementById('rain-audio');

    const countdown = setInterval(() => {
      let minute = document.getElementById("minute");
      let second = document.getElementById("seconds");

      if (!pause) {


        if (minute.innerText === "00" && second.innerText === "00") {
          clearInterval(countdown);
          reset();
          return;
        }

        if (second.innerText == "00") {
          second.innerText = "59";
          minute.innerText = Number(minute.innerText) - 1;
        } else {
          if (Number(second.innerText) < 11) {
            second.innerText = "0" + (Number(second.innerText) - 1);
          } else {
            second.innerText = (Number(second.innerText) - 1);
          }

        }
      }

    }, 1000);

    function reset() {
      let minute = document.getElementById("minute");
      let second = document.getElementById("seconds");
      minute.innerText = "25";
      second.innerText = "00";
      rain_audio.pause();
      rain_audio.currentTime = 0;
      pause = true;
      start.style.display = "block";
    }

    function startCountdown() {
      if (pause) {
        start.style.display = "none";
        pause = false;
        rain_audio.play();
      } else {
        start.style.display = "block";
        pause = true;
        rain_audio.pause();
      }


    }

    // (async () => {
    //   await Swal.fire({
    //     title: "Welcome to Chilling Workplace, check in today!"
    //     , icon: 'success'
    //   });
    // })();

  </script>
</div>
