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
      padding-bottom: 4.5rem;
      /* border-radius: 30px; */
      /* border: solid 1px; */
    }

    .content-nav {
      height: 5rem;
      width: 100%;
      /* border: solid 1px; */
      border-radius: 20px;
      display: flex;
      justify-content: space-between;
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
  @if(Auth::user()->role == 'educator')
  <button class="add-btn" data-bs-toggle="modal" data-bs-target="#pastYearModal">
    <p class="p-0 m-0">+</p>
  </button>
  @endif

  <div class="menu-side">
    <div class="menu-side-inside overflow-hidden">
      <ul class="list-group ">
        <li class="list-group-item border-0">
          <a role="button" href="{{ route('study-workplace-primary-secondary') }}" class="btn w-100 text-start">Self-Improvement</a>
        </li>
        <li class="list-group-item border-0">
          <a role="button" href="{{ route('discussion-community') }}" class="btn w-100 text-start">Discussion Community</a>
        </li>
        <li class="list-group-item border-0">
          <a role="button" href="{{ route('past-year-paper') }}" class="btn w-100 text-start selected-route">Past Year Paper</a>
        </li>
        <li class="list-group-item border-0">
          <a role="button" href="{{ route('community-note-sharing') }}" class="btn w-100 text-start">Community Note Sharing</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="content">
    <div class="content-nav px-3">
      <div class="d-flex align-items-center justify-content-between w-100">
        <div class="d-flex gap-3">
          <div class="form-floating me-3">
            <select wire:model.live="educationLevel" id="educationLevel" class="form-select">
              <option selected value="primary">Primary</option>
              <option value="secondary">Secondary</option>
              <option value="pre-u">Pre-U</option>
              <option value="university">University</option>
            </select>
            <label for="educationLevel">Education Level</label>
          </div>
          @if($educationLevel == 'university')
          <div class="form-floating me-3">
            <select wire:model.live="major" id="major" class="form-select">
              <option selected value="">--Select--</option>
              @foreach ($allMajor as $major)
              <option value="{{$major->major}}">{{ucwords($major->major)}}</option>
              @endforeach
            </select>
            <label for="major">Major</label>
          </div>

          @elseif($educationLevel == "primary" || $educationLevel == "secondary")
          <div class="form-floating me-3">
            <select wire:model.live="year" id="yearOfStudy" class="form-select">
              <option value="" selected>--Select--</option>
              @if($educationLevel == "secondary")
              <option value="1">Form 1</option>
              <option value="2">Form 2</option>
              <option value="3">Form 3</option>
              <option value="4">Form 4</option>
              <option value="5">Form 5</option>
              @else
              <option value="1">Year 1</option>
              <option value="2">Year 2</option>
              <option value="3">Year 3</option>
              <option value="4">Year 4</option>
              <option value="5">Year 5</option>
              <option value="6">Year 6</option>
              @endif
            </select>
            <label for="yearOfStudy">Year</label>
          </div>
          @endif

          @if($educationLevel == "primary" || $educationLevel == "secondary")
          <div class="form-floating me-3">
            <select wire:model.live="subject" id="subject" class="form-select">
              <option selected value="">--Select--</option>
              @foreach ($allSubject as $subject)
              <option value="{{$subject->subject}}">{{ucwords($subject->subject)}}</option>
              @endforeach

            </select>
            <label for="subject">Subject</label>
          </div>
          @endif
        </div>
        <input type="text" wire:model.live="search" class="form-control" style="width: 20rem;" placeholder="Search...">


      </div>

    </div>

    <div class="content-inside">
      <div class="d-flex px-3 flex-grow-1 flex-column gap-4 h-100 overflow-scroll">

        @forelse ($pys as $py) <div class="d-flex flex-column gap-3 border border-2 px-3 py-3 rounded-3 border-dark border-opacity-25">
          <h3>{{$py->title}}</h3>
          <p>
            {{$py->description}}
          </p>
          <div class="d-flex gap-3 justify-content-between">
            @if(isset($py->likes->user_id) == false || (isset($py->likes->user_id) && $py->likes->user_id != Auth::user()->id))
            <button wire:click="like({{$py->id}})" class="bg-transparent border-0 d-flex gap-3 align-items-center ">
              <img src="{{ asset('like-icon.svg') }}" alt="like">
              <p class="p-0 m-0">{{$py->like}}</p>
            </button>
            @else
            <button class="bg-transparent border-0 d-flex gap-3 align-items-center" style="pointer-events: none;">
              <img src="{{ asset('like-icon-fill.svg') }}" alt="like">
              <p class="p-0 m-0">{{$py->like}}</p>
            </button>
            @endif
            <a role="button" href="/study-workplace/primary-secondary/past-year-paper/{{$py->id}}" class="button-27">View</a>
          </div>
        </div>
        @empty
        <div class="h-100 w-100 d-flex justify-content-center align-items-center ">
          <h1>Empty!</h1>
        </div>
        @endforelse
        <div class="mt-4 w-100 d-flex justify-content-center ">
          {{ $pys->links('vendor.livewire.bootstrap') }}
        </div>
      </div>
    </div>
  </div>

  {{-- ! Modal --}}
  <div wire:ignore.self class="modal modal-lg fade" id="pastYearModal" tabindex="-1" aria-labelledby="pastYearModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="pastYearModalLabel">Add Past Year Paper</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form onsubmit="close_py()" wire:submit="addPY" class="modal-body">
          <div class="form-floating mb-3">
            <input wire:model="form.title" type="text" class="form-control" id="cctitle" placeholder="abc" required>
            <label for="cctitle">Title</label>
          </div>
          <div class="d-flex gap-3">
            <div class="form-floating mb-3 w-100">
              <select wire:model.live="education_level_input" id="education_level" class="form-select" required>
                <option selected value="">--Select--</option>
                <option value="primary">Primary</option>
                <option value="secondary">Secondary</option>
                <option value="pre-u">Pre-U</option>
                <option value="university">University</option>
              </select>
              <label for="education_level">Education Level</label>
            </div>
            @if($education_level_input == 'primary')
            <div class="form-floating mb-3 w-100">
              <select wire:model="form.year" class="form-select" required>
                <option id="year" selected>--Select--</option>
                <option value="1">Primary 1</option>
                <option value="2">Primary 2</option>
                <option value="3">Primary 3</option>
                <option value="4">Primary 4</option>
                <option value="5">Primary 5</option>
                <option value="6">Primary 6</option>
              </select>
              <label for="year">Year</label>
            </div>

            <div class="form-floating mb-3 w-100">
              <select id="subject" wire:model.live="inputSubject" class="form-select" required>
                <option selected>--Select--</option>
                @foreach ($allSubjectInput as $subject)
                <option value="{{$subject->subject}}">{{ucwords($subject->subject)}}</option>
                @endforeach
                <option value="other">Other</option>
              </select>
              <label for="subject">Subject</label>
            </div>
            @elseif ($education_level_input == 'secondary')
            <div class="form-floating mb-3 w-100">
              <select wire:model="form.year" class="form-select" required>
                <option id="year" selected>--Select--</option>
                <option value="1">Form 1</option>
                <option value="2">Form 2</option>
                <option value="3">Form 3</option>
                <option value="4">Form 4</option>
                <option value="5">Form 5</option>
              </select>
              <label for="year">Year</label>
            </div>
            <div class="form-floating mb-3 w-100">
              <select id="subject" wire:model.live="inputSubject" class="form-select" required>
                <option selected>--Select--</option>
                @foreach ($allSubjectInput as $subject)
                <option value="{{$subject->subject}}">{{ucwords($subject->subject)}}</option>
                @endforeach
                <option value="other">Other</option>
              </select>
              <label for="subject">Subject</label>
            </div>
            @elseif ($education_level_input == 'university')
            <div class="form-floating mb-3 w-100">
              <select id="major" wire:model.live="inputMajor" class="form-select" required>
                <option selected>--Select--</option>
                @foreach ($allMajor as $major)
                <option value="{{$major->major}}">{{ucwords(str_replace('_', ' ', $major->major))}}</option>
                @endforeach
                <option value='other'>Other</option>
              </select>
              <label for="major">Major</label>
            </div>

            @endif
          </div>
          @if($inputSubject == "other")
          <div class="form-floating mb-3">
            <input wire:model="newSubject" type="text" class="form-control" id="newSubject" placeholder="new major" required>
            <label for="newSubject">Subject</label>
          </div>
          @endif
          @if($inputMajor == "other")
          <div class="form-floating mb-3">
            <input wire:model="newMajor" type="text" class="form-control" id="newMajor" placeholder="new major" required>
            <label for="newMajor">New Major</label>
          </div>
          @endif
          <div class="form-floating mb-3">
            <textarea wire:model="form.description" rows="5" class="form-control h-100" id="ccdescription" placeholder="abc" required> </textarea>
            <label for="ccdescription">Description</label>
          </div>
          <div class="mb-3">
            <label for="paper" class="form-label">Paper</label>
            <input wire:model="form.paper_url" class="form-control" type="file" accept=".pdf" id="paper" required>
          </div>
          <div class="mb-3">
            <label for="answer" class="form-label">Answer</label>
            <input wire:model="form.answer_url" class="form-control" type="file" accept=".pdf" id="answer">
          </div>
          <button id="submit_py" type="submit" class="d-none">submit</button>

        </form>

        <div class="modal-footer">
          <button id="close_py" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button onclick="submit_py()" type="button" class="btn btn-primary">Add</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    function close_py() {
      document.getElementById('close_py').click();
    }

    async function submit_py() {
      await Swal.fire({
        title: "Do you sure to add this paper?"
        , icon: 'warning'
        , showCancelButton: true
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('submit_py').click();
        }
      })
    }

    const pastYearModal = document.getElementById('pastYearModal')
    if (pastYearModal) {
      window.addEventListener('show.bs.modal', event => {
        let inputs = pastYearModal.querySelectorAll('input, select, textarea');
        inputs.forEach((input) => {
          input.value = "";
        })
      })
    }

    window.addEventListener("modal:success", async (event) => {
      console.log(event);
      await Swal.fire({
        title: `Successfully added the past year paper!`
        , icon: 'success'
        , showCancelButton: true
        , timer: 2000
      })
    })

  </script>
</div>
