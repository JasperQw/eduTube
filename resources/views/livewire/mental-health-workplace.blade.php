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
      padding-bottom: 2.5rem;
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

  </style>
  @if(Auth::user()->role == "counsellor")
  <button class="add-btn" data-bs-toggle="modal" data-bs-target="#articleModal">
    <p class="p-0 m-0">+</p>
  </button>
  @endif

  <div class="menu-side ">
    <div class="menu-side-inside overflow-hidden bg-white ">
      <ul class="list-group ">
        <li class="list-group-item border-0">
          <a role="button" href="{{ route('mental-health-workplace') }}" class="btn w-100 text-start selected-route">Articles</a>
        </li>
        <li class="list-group-item border-0">
          <a role="button" href="{{ route('counselling-section') }}" class="btn w-100 text-start">Counselling</a>
        </li>
        <li class="list-group-item border-0">
          <a role="button" href="{{ route('stress-detector') }}" class="btn w-100 text-start">Stress Detector</a>
        </li>
        <li class="list-group-item border-0">
          <a role="button" href="{{ route('playground') }}" class="btn w-100 text-start">Playground</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="content">
    <div class="content-nav px-3 w-100 ">
      <input wire:model.live="search" type="text" class="form-control" placeholder="Search..." style="width: 20rem;">
    </div>

    <div class="content-inside">
      <div class="d-flex flex-grow-1 flex-column gap-5 h-100 overflow-scroll">
        @forelse ($articles as $article)
        <div class="bg-white  d-flex gap-4 px-3 mx-3 border border-2 border-opacity-25 border-secondary py-4 px-5 rounded-4">
          <a href="/user-profile/{{$article->user->id}}"><img src="{{asset($article->user->profile_image)}}" class="avatar" alt="avatar"></a>
          <div class="d-flex flex-column w-100">
            <div class="h-100 w-100">
              <p class=" fs-3 ">{{$article->title}}</p>
              <p>{{$article->description}}</p>
            </div>
            <div class="d-flex gap-3 justify-content-between align-items-center ">
              @if(isset($article->likes->user_id) == false || (isset($article->likes->user_id) && $article->likes->user_id != Auth::user()->id))
              <button wire:click="like({{$article->id}})" class="bg-transparent border-0 d-flex gap-3 align-items-center ">
                <img src="{{ asset('like-icon.svg') }}" alt="like">
                <p class="p-0 m-0">{{$article->like}}</p>
              </button>
              @else
              <button class="bg-transparent border-0 d-flex gap-3 align-items-center " style="pointer-events: none;">
                <img src="{{ asset('like-icon-fill.svg') }}" alt="like">
                <p class="p-0 m-0">{{$article->like}}</p>
              </button>
              @endif
              <a role="button" href="/mental-health-workplace/article/{{$article->id}}" class="button-27">View</a>
            </div>
          </div>

        </div>
        @empty
        <div class="h-100 w-100 d-flex justify-content-center align-items-center ">
          <h1 class="fw-bold ">Empty!</h1>
        </div>
        @endforelse



      </div>
      {{-- <div class="mt-4 w-100 d-flex justify-content-center ">
        {{ $ccs->links('vendor.livewire.bootstrap') }}
    </div> --}}
  </div>

  {{-- !! Article Modal --}}
  <div wire:ignore.self class="modal modal-lg fade" id="articleModal" tabindex="-1" aria-labelledby="articleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="articleModalLabel">Add Mental Health Article</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form onsubmit="close_article()" wire:submit="addArticle" class="modal-body">
          <div class="form-floating mb-3">
            <input wire:model="form.title" type="text" class="form-control" id="cctitle" placeholder="abc" required>
            <label for="cctitle">Title</label>
          </div>
          <div class="form-floating mb-3">
            <textarea rows="5" wire:model="form.description" type="text" class="form-control h-100" id="description" placeholder="abc" required></textarea>
            <label for="description">Description</label>
          </div>

          <div class="form-floating mb-3">
            <textarea rows="10" wire:model="form.content" type="text" class="form-control h-100" id="content" placeholder="abc" required></textarea>
            <label for="content">Content</label>
          </div>

          <button id="submit_article" type="submit" class="d-none">submit</button>
        </form>
        <div class="modal-footer">
          <button id="close_article" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button onclick="submit_article()" type="button" class="btn btn-primary">Add</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    function close_article() {
      document.getElementById('close_article').click();
    }

    async function submit_article() {
      await Swal.fire({
        title: "Do you sure to add this article?"
        , icon: 'warning'
        , showCancelButton: true
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('submit_article').click();
        }
      })
    }

    const articleModal = document.getElementById('articleModal')
    if (articleModal) {
      articleModal.addEventListener('show.bs.modal', event => {
        let inputs = articleModal.querySelectorAll('input, textarea');
        inputs.forEach((input) => {
          input.value = "";
        })
      })
    }

  </script>
</div>
