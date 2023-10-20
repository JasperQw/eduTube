<div class="h-100 d-flex gap-4 w-100 pt-4" style="padding-bottom: 4rem;">
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

    .profile-image {
      width: 15rem;
      height: 15rem;
      border-radius: 100%;
      border: 1px solid;
    }

    .info-section {
      width: 100%;
      flex: 1;
      height: 100%;
    }

    .profile-info-container {
      height: 100%;
      width: 30rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 10px;
      border-style: none;
      border-radius: 15px;
      font-size: 16px;
      gap: 2rem;
    }

    .collection-container {
      box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
    }

    .poster-container {
      display: flex;
      flex-direction: column;
      gap: 2rem;
    }


    /* CSS */
    .button-69 {
      background-color: initial;
      background-image: linear-gradient(#8614f8 0, #760be0 100%);
      border-radius: 5px;
      border-style: none;
      box-shadow: rgba(245, 244, 247, .25) 0 1px 1px inset;
      color: #fff;
      cursor: pointer;
      display: inline-block;
      font-family: Inter, sans-serif;
      font-size: 16px;
      font-weight: 500;
      height: 60px;
      line-height: 60px;
      margin-left: -4px;
      outline: 0;
      text-align: center;
      transition: all .3s cubic-bezier(.05, .03, .35, 1);
      user-select: none;
      -webkit-user-select: none;
      touch-action: manipulation;
      vertical-align: bottom;
      width: 190px;
    }

    .button-69:hover {
      opacity: .7;
    }

    @media screen and (max-width: 1000px) {
      .button-69 {
        font-size: 14px;
        height: 55px;
        line-height: 55px;
        width: 150px;
      }
    }

  </style>
  <div class="ms-4 profile-info-container">
    @if(Auth::user()->id != $user->id)
    <img wire:ignore.self id="profile-image" class="profile-image" src="{{ asset($user->profile_image) }}" alt="user-picture">
    @else
    <img wire:ignore.self id="profile-image" onclick="changeProfileImage()" class="profile-image" src="{{ asset($user->profile_image) }}" alt="user-picture">
    @endif

    @if(isset($image))
    <button onclick="confirmChange()" class="btn btn-outline-dark ">Confirmed Changes</button>
    @endif
    <input onchange="loadFile(event)" wire:model.live='image' id="image-upload" type="file" accept="image/*" hidden>
    <div class="info-section">
      <div class="d-flex gap-5 justify-content-between align-items-center">
        <p class="col-3">Name: </p>
        <p class="col-9 text-center">{{$user->name}}</p>
      </div>

      <div class="d-flex gap-5 justify-content-between align-items-center">
        <p class="col-3">Email: </p>
        <p class="col-9 text-center">{{$user->email}}</p>
      </div>

      <div class="d-flex gap-5 justify-content-between align-items-center">
        <p class="col-3">Birthday: </p>
        <p class="col-9 text-center">{{$user->birthday}}</p>
      </div>

      <div class="d-flex gap-5 justify-content-between align-items-center">
        <p class="col-3">Age: </p>
        <p class="col-9 text-center">{{$user->age}}</p>
      </div>

      <div class="d-flex gap-5 justify-content-between align-items-center ">
        <p class="col-3">Education level: </p>
        <p class="col-9 text-center">{{ucwords($user->education_level)}}</p>
      </div>

      <div class="d-flex gap-5 justify-content-between align-items-center ">
        <p class="col-3">Role: </p>
        <p class="col-9 text-center">{{ucwords($user->role)}}</p>
      </div>

      @if(Auth::user()->id == $user->id)
      <button class="button-69 w-100" role="button">Points: {{$user->points}}</button>
      @endif

    </div>
  </div>
  <div class="h-100 flex-1 w-100 me-4 pb-2">

    <div class="position-relative collection-container w-100 h-100 rounded-3 overflow-scroll p-4">
      <div class=" poster-container ">

        @forelse($collections as $collection)
        <div class="d-flex flex-column gap-3 border border-2 p-4 rounded-3 border-dark border-opacity-25">
          <h3>{{$collection->title}}</h3>
          <p>
            {{$collection->description}}
          </p>

          <div class="d-flex gap-3 justify-content-end">
            <a href="/study-workplace/primary-secondary/community-note-sharing/{{$collection->id}}" class="button-27">View</a>
          </div>

        </div>


        @empty
        <div class="position-absolute top-0 bottom-0 start-0 end-0 d-flex justify-content-center align-items-center ">
          <h1>Empty!</h1>
        </div>
        @endforelse



      </div>

    </div>
  </div>

  <script>
    function loadFile(event) {
      let url = URL.createObjectURL(event.target.files[0]);
      let profile_image = document.getElementById('profile-image');
      profile_image.src = url;
    }

    function changeProfileImage(event) {
      let image = document.getElementById('image-upload');
      image.click();
    }

    async function confirmChange() {
      await Swal.fire({
        title: "Do you confirm to change you profile image?"
        , icon: 'warning'
        , showCancelButton: true
      , }).then(result => {
        if (result.isConfirmed) {
          @this.changeImage();
        }
      })
    }

    window.addEventListener('modal:success', async (event) => {
      await Swal.fire({
        title: "Successfully changed your profile image!"
        , icon: 'success'
        , timer: 2000
      , })
    })

  </script>
</div>
