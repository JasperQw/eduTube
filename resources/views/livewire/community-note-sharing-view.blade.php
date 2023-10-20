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

  </style>
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
          <a role="button" href="{{ route('past-year-paper') }}" class="btn w-100 text-start">Past Year Paper</a>
        </li>
        <li class="list-group-item border-0">
          <a role="button" href="{{ route('community-note-sharing') }}" class="btn w-100 text-start selected-route">Community Note Sharing</a>
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
              <option value="{{$major->major}}">{{ucwords(str_replace("_", " ", $major->major))}}</option>
              @endforeach
            </select>
            <label for="major">Major</label>
          </div>
          @endif
          @if($educationLevel == "primary" || $educationLevel == "secondary")
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
              <option value="{{$subject->subject}}">{{ucwords(str_replace("_", " ", $subject->subject))}}</option>
              @endforeach
            </select>
            <label for="subject">Subject</label>
          </div>
          @endif
        </div>
        <input wire:model.live="search" type="text" class="form-control" style="width: 20rem;" placeholder="Search...">


      </div>

    </div>


    <div class="content-inside">
      <div class="d-flex px-3 flex-grow-1 flex-column gap-4 h-100 overflow-scroll" style="height: 33rem; min-height: 33rem; max-height: 33rem;">


        @forelse($cns as $cn)
        <div class="d-flex flex-column gap-3 border border-2 p-4 rounded-3 border-dark border-opacity-25">
          <h3>{{$cn->title}}</h3>
          <p>
            {{$cn->description}}
          </p>
          <div class="d-flex justify-content-between align-items-center ">
            <div class="d-flex gap-5 align-items-end h-100">

              @if(isset($cn->likes->user_id) == false || (isset($cn->likes->user_id) && $cn->likes->user_id != Auth::user()->id))
              <button wire:click="like({{$cn->id}})" class="bg-transparent border-0 d-flex gap-3 align-items-center ">
                <img src="{{ asset('like-icon.svg') }}" alt="like">
                <p class="p-0 m-0">{{$cn->like}}</p>
              </button>
              @else
              <button class="bg-transparent border-0 d-flex gap-3 align-items-center" style="pointer-events: none;">
                <img src="{{ asset('like-icon-fill.svg') }}" alt="like">
                <p class="p-0 m-0">{{$cn->like}}</p>
              </button>
              @endif

              @if(isset($cn->collects->user_id) == false || (isset($cn->collects->user_id) && $cn->collects->user_id != Auth::user()->id))
              <button wire:click="collect({{$cn->id}})" class="bg-transparent border-0 d-flex gap-3 align-items-center ">
                <img src="{{ asset('collect.svg') }}" alt="like">
                <p class="p-0 m-0">Collect</p>
              </button>
              @else
              <button style="pointer-events: none;" class="bg-transparent border-0 d-flex gap-3 align-items-center ">
                <img src="{{ asset('collect.svg') }}" alt="like">
                <p class="p-0 m-0">Collected!</p>
              </button>
              @endif


            </div>
            <div class="d-flex gap-3 justify-content-end">
              <a href="/study-workplace/primary-secondary/community-note-sharing/{{$cn->id}}" class="button-27">View</a>
            </div>
          </div>
        </div>
        @empty
        <div class="h-100 w-100 d-flex justify-content-center align-items-center ">
          <h1>Empty!</h1>
        </div>
        @endforelse



      </div>
      <div class="px-3 mt-4 mb-3 d-flex gap-3 align-items-center justify-content-center ">
        <button class="button-27 w-100" role="button" data-bs-toggle="modal" data-bs-target="#communityNoteModal">Upload Your Note!</button>
      </div>
    </div>
  </div>

  {{-- ! Modal --}}
  <div wire:ignore.self class="modal modal-lg fade" id="communityNoteModal" tabindex="-1" aria-labelledby="communityNoteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="communityNoteModalLabel">Add Community Note</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form onsubmit="close_cn()" wire:submit="addCN" class="modal-body">
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
            <label for="paper" class="form-label">Note</label>
            <input wire:model="form.note_url" class="form-control" type="file" accept=".pdf" id="paper" required>
          </div>
          <button id="submit_cn" type="submit" class="d-none">submit</button>

        </form>

        <div class="modal-footer">
          <button id="close_cn" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button onclick="submit_cn()" type="button" class="btn btn-primary">Add</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    function close_cn() {
      document.getElementById('close_cn').click();
    }

    async function submit_cn() {
      await Swal.fire({
        title: "Do you sure to add this note?"
        , icon: 'warning'
        , showCancelButton: true
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('submit_cn').click();
        }
      })
    }

    const communityNoteModal = document.getElementById('communityNoteModal')
    if (communityNoteModal) {
      window.addEventListener('show.bs.modal', event => {
        let inputs = communityNoteModal.querySelectorAll('input, select, textarea');
        inputs.forEach((input) => {
          input.value = "";
        })
      })
    }

    window.addEventListener("modal:success", async (event) => {
      await Swal.fire({
        title: `Successfully added the note`
        , icon: 'success'
        , showCancelButton: true
        , timer: 2000
      })
    })

  </script>
</div>
