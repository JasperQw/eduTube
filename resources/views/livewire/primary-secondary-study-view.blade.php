<div class="w-100 h-100 d-flex py-4">
  <style>
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

  @if (Auth::user()->role == 'educator')

  @if($section == "cc")
  <button class="add-btn" data-bs-toggle="modal" data-bs-target="#ccModal">
    <p class="p-0 m-0">+</p>
  </button>
  @elseif ($section == "webinars")
  <button class="add-btn" data-bs-toggle="modal" data-bs-target="#webinarModal">
    <p class="p-0 m-0">+</p>
  </button>
  @elseif ($section == "ln")
  <button class="add-btn" data-bs-toggle="modal" data-bs-target="#LectureNoteModal">
    <p class="p-0 m-0">+</p>
  </button>
  @elseif ($section == "tutorials")
  <button class="add-btn" data-bs-toggle="modal" data-bs-target="#TutorialModal">
    <p class="p-0 m-0">+</p>
  </button>
  @elseif ($section == "gl")
  <button class="add-btn" data-bs-toggle="modal" data-bs-target="#glModal">
    <p class="p-0 m-0">+</p>
  </button>
  @endif
  @endif
  <div class="menu-side">
    <div class="menu-side-inside overflow-hidden">
      <ul class="list-group ">
        <li class="list-group-item border-0">
          <a role="button" href="{{ route('study-workplace-primary-secondary') }}" class="btn w-100 text-start selected-route">Self-Improvement</a>
        </li>
        <li class="list-group-item border-0">
          <a role="button" href="{{ route('discussion-community') }}" class="btn w-100 text-start">Discussion Community</a>
        </li>
        <li class="list-group-item border-0">
          <a role="button" href="{{ route('past-year-paper') }}" class="btn w-100 text-start">Past Year Paper</a>
        </li>
        <li class="list-group-item border-0">
          <a role="button" href="{{ route('community-note-sharing') }}" class="btn w-100 text-start">Community Note Sharing</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="content">
    <div class="content-nav px-3">
      <div class="d-flex gap-3">
        <div class="form-floating me-3">
          <select wire:model.live="educationLevel" id="educationLevel" class="form-select">
            <option selected value="">--Select--</option>
            <option value="primary">Primary</option>
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
            <option value="{{$major->major}}">{{ucwords(str_replace('_', " ", $major->major))}}</option>
            @endforeach
          </select>
          <label for="major">Major</label>
        </div>
        @endif
        @if($educationLevel == "primary" || $educationLevel == "secondary")
        <div class="form-floating me-3">
          <select wire:model.live="year" id="yearOfStudy" class="form-select">
            @if($educationLevel == "secondary")
            <option selected value="">--Select--</option>
            <option value="1">Form 1</option>
            <option value="2">Form 2</option>
            <option value="3">Form 3</option>
            <option value="4">Form 4</option>
            <option value="5">Form 5</option>
            @else
            <option selected value="">--Select--</option>
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
      </div>

      <ul class="nav-underline nav d-flex gap-5">
        <li class="nav-item">
          <button class="nav-link @if($section == 'cc') active @endif" wire:click="changeSection('cc')">Crash Course</button>
        </li>
        <li class="nav-item">
          <button class="nav-link @if($section == 'webinars') active @endif" wire:click="changeSection('webinars')">Webinars</button>
        </li>
        <li class="nav-item">
          <button class="nav-link @if($section == 'ln') active @endif" wire:click="changeSection('ln')">Notes</button>
        </li>
        <li class="nav-item">
          <button class="nav-link @if($section == 'tutorials') active @endif" wire:click="changeSection('tutorials')">Tutorials</button>
        </li>
        <li class="nav-item">
          <button class="nav-link @if($section == 'gl') active @endif" wire:click="changeSection('gl')">Guest Lecture</button>
        </li>
      </ul>
    </div>
    <div class="content-inside">


      @if ($section == 'cc')
      {{-- !! Crash Course --}}
      <div class="input-group mt-3 mb-5 top-0 px-3" style="width: 30rem;">
        <span class="input-group-text" id="basic-addon1">Search</span>
        <input wire:model.live="search" type="text" class="form-control" placeholder="Search the video..." aria-label="Username" aria-describedby="basic-addon1">
      </div>
      <div class="d-flex flex-grow-1 flex-column gap-5 h-100 overflow-scroll">

        @forelse($ccs as $cc)
        <div class="d-flex gap-4 px-3">
          <a href="/study-workplace/primary-secondary/crash-course/{{$cc->id}}"><img class="image-sizing" src="http://img.youtube.com/vi/{{$cc->yt_code}}/hqdefault.jpg" alt="thumbnail"></a>
          <div class="d-flex flex-column ">
            <div class="h-100">
              <p class=" fs-3 ">{{$cc->title}}</p>
              <p>{{$cc->description}}</p>
            </div>
            @if(isset($cc->likes->user_id) == false || (isset($cc->likes->user_id) && $cc->likes->user_id != Auth::user()->id))
            <button wire:click="like({{$cc->id}})" class="bg-transparent border-0 d-flex gap-3 align-items-center mb-3 ">
              <img src="{{ asset('like-icon.svg') }}" alt="like">
              <p class="p-0 m-0">{{$cc->like}}</p>
            </button>
            @else
            <button class="bg-transparent border-0 d-flex gap-3 align-items-center mb-3" style="pointer-events: none;">
              <img src="{{ asset('like-icon-fill.svg') }}" alt="like">
              <p class="p-0 m-0">{{$cc->like}}</p>
            </button>
            @endif
          </div>

        </div>
        @empty
        <div class="h-100 w-100 d-flex justify-content-center align-items-center ">
          <h1>Empty!</h1>
        </div>
        @endforelse


      </div>
      <div class="mt-4 w-100 d-flex justify-content-center ">
        {{ $ccs->links('vendor.livewire.bootstrap') }}
      </div>

      @elseif ($section == 'webinars')
      {{-- !! Webinars --}}
      <div class="d-flex justify-content-between align-items-center mt-3 mb-5 px-3">
        <div class="input-group" style="width: 30rem;">
          <span class="input-group-text" id="basic-addon1">Search</span>
          <input wire:model.live="search" type="text" class="form-control" placeholder="Search the video..." aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <ul class="nav-underline nav d-flex gap-5">
          <li class="nav-item">
            <a class="nav-link @if($type == '') active @endif" wire:click="changeType('')" href="#">All</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if($type == 'streaming') active @endif" wire:click="changeType('streaming')" href="#">Streaming</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if($type == 'previous') active @endif" wire:click="changeType('previous')" href="#">Previous</a>
          </li>

        </ul>
      </div>
      <div class="d-flex flex-grow-1 flex-column gap-5 h-100 overflow-scroll">

        @forelse ($webinars as $webinar)
        <div class="d-flex gap-4 px-3">
          <a href="/study-workplace/primary-secondary/webinar/{{$webinar->id}}"><img class="image-sizing" src="http://img.youtube.com/vi/{{$webinar->yt_code}}/hqdefault.jpg" alt="thumbnail"></a>
          <div class="d-flex flex-column">
            <div class="h-100">
              <p class=" fs-3 ">{{$webinar->title}}</p>
              <p>{{$webinar->description}}</p>
            </div>
            @if(isset($webinar->likes->user_id) == false || (isset($webinar->likes->user_id) && $webinar->likes->user_id != Auth::user()->id))
            <button wire:click="like({{$webinar->id}})" class="bg-transparent border-0 d-flex gap-3 align-items-center mb-3 ">
              <img src="{{ asset('like-icon.svg') }}" alt="like">
              <p class="p-0 m-0">{{$webinar->like}}</p>
            </button>
            @else
            <button class="bg-transparent border-0 d-flex gap-3 align-items-center mb-3" style="pointer-events: none;">
              <img src="{{ asset('like-icon-fill.svg') }}" alt="like">
              <p class="p-0 m-0">{{$webinar->like}}</p>
            </button>
            @endif
          </div>


        </div>

        @empty

        <div class="h-100 w-100 d-flex justify-content-center align-items-center ">
          <h1>Empty!</h1>
        </div>

        @endforelse

      </div>
      <div class="mt-4 w-100 d-flex justify-content-center ">
        {{ $webinars->links('vendor.livewire.bootstrap') }}
      </div>
      @elseif ($section == 'ln')
      {{-- ! Lecture Notes --}}
      <div class="input-group mt-3 mb-5 top-0 px-3" style="width: 30rem;">
        <span class="input-group-text" id="basic-addon1">Search</span>
        <input wire:model.live="search" type="text" class="form-control" placeholder="Search the note..." aria-label="Username" aria-describedby="basic-addon1">
      </div>
      <div class="d-flex flex-grow-1 flex-column gap-5 h-100 overflow-scroll">

        @forelse($lns as $ln)
        <div class="d-flex gap-4 mx-3 border border-2 border-opacity-25 border-secondary py-4 px-5 rounded-4">
          {{-- <embed class="image-sizing" name="plugin" src="{{asset('Notes_231015_131745.pdf')}}" type="application/pdf"> --}}
          <div>
            <p class=" fs-3 ">{{$ln->title}}</p>
            <p>{{$ln->description}}</p>
            <div class="d-flex justify-content-between align-items-center ">
              @if(isset($ln->likes->user_id) == false || (isset($ln->likes->user_id) && $ln->likes->user_id != Auth::user()->id))
              <button wire:click="like({{$ln->id}})" class="bg-transparent border-0 d-flex gap-3 align-items-center ">
                <img src="{{ asset('like-icon.svg') }}" alt="like">
                <p class="p-0 m-0">{{$ln->like}}</p>
              </button>
              @else
              <button class="bg-transparent border-0 d-flex gap-3 align-items-center " style="pointer-events: none;">
                <img src="{{ asset('like-icon-fill.svg') }}" alt="like">
                <p class="p-0 m-0">{{$ln->like}}</p>
              </button>
              @endif
              <a role="button" href="/study-workplace/primary-secondary/lecture-note/{{$ln->id}}" class="btn btn-outline-dark px-5 ">View</a>
            </div>

          </div>
        </div>
        @empty
        <div class="h-100 w-100 d-flex justify-content-center align-items-center ">
          <h1>Empty!</h1>
        </div>
        @endforelse


      </div>
      <div class="mt-4 w-100 d-flex justify-content-center ">
        {{ $lns->links('vendor.livewire.bootstrap') }}
      </div>
      @elseif ($section == 'tutorials')
      {{-- ! Tutorials --}}
      <div class="d-flex justify-content-between align-items-center mt-3 mb-5 px-3">
        <div class="input-group" style="width: 30rem;">
          <span class="input-group-text" id="basic-addon1">Search</span>
          <input type="text" class="form-control" placeholder="Search the video..." aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <ul class="nav-underline nav d-flex gap-5">
          <li class="nav-item">
            <a class="nav-link @if($type == '') active @endif" wire:click="changeType('')" href="#">All</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if($type == 'free') active @endif" wire:click="changeType('free')" href="#">Free</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if($type == 'subscribe') active @endif" wire:click="changeType('subscribe')" href="#">Subscribe</a>
          </li>

        </ul>
      </div>
      <div class="d-flex flex-grow-1 flex-column gap-5 h-100 overflow-scroll">
        @forelse ($tutorials as $tutorial)
        <div class="d-flex gap-4 mx-3 border border-2 border-opacity-25 border-secondary py-4 px-5 rounded-4">
          <div class="">
            <p class=" fs-3 ">{{$tutorial->title}}</p>
            <p>{{$tutorial->description}}</p>
            <div class="d-flex justify-content-between align-items-center ">
              @if(isset($tutorial->likes->user_id) == false || (isset($tutorial->likes->user_id) && $tutorial->likes->user_id != Auth::user()->id))
              <button wire:click="like({{$tutorial->id}})" class="bg-transparent border-0 d-flex gap-3 align-items-center ">
                <img src="{{ asset('like-icon.svg') }}" alt="like">
                <p class="p-0 m-0">{{$tutorial->like}}</p>
              </button>
              @else
              <button class="bg-transparent border-0 d-flex gap-3 align-items-center " style="pointer-events: none;">
                <img src="{{ asset('like-icon-fill.svg') }}" alt="like">
                <p class="p-0 m-0">{{$tutorial->like}}</p>
              </button>
              @endif
              <a role="button" href="/study-workplace/primary-secondary/tutorial/{{$tutorial->id}}" class="btn btn-outline-dark px-5 ">View</a>
            </div>

          </div>
        </div>
        @empty
        <div class="h-100 w-100 d-flex justify-content-center align-items-center ">
          <h1>Empty!</h1>
        </div>
        @endforelse
      </div>
      <div class="mt-4 w-100 d-flex justify-content-center ">
        {{ $tutorials->links('vendor.livewire.bootstrap') }}
      </div>
      @else
      {{-- ! Guest Lecture --}}
      <div class="input-group mt-3 mb-5 top-0 px-3" style="width: 30rem;">
        <span class="input-group-text" id="basic-addon1">Search</span>
        <input type="text" class="form-control" placeholder="Search the video..." aria-label="Username" aria-describedby="basic-addon1">
      </div>
      <div class="d-flex flex-grow-1 flex-column gap-5 h-100 overflow-scroll">

        @forelse($gls as $gl)
        <div class="d-flex gap-4 px-3">
          <a href="/study-workplace/primary-secondary/guest-lecture/{{$gl->id}}"><img class="image-sizing" src="http://img.youtube.com/vi/{{$gl->yt_code}}/hqdefault.jpg" alt="thumbnail"></a>
          <div class="d-flex flex-column ">
            <div class="h-100">
              <p class=" fs-3 ">{{$gl->title}}</p>
              <p>{{$gl->description}}</p>
            </div>

            @if(isset($gl->likes->user_id) == false || (isset($gl->likes->user_id) && $gl->likes->user_id != Auth::user()->id))
            <button wire:click="like({{$gl->id}})" class="bg-transparent border-0 d-flex gap-3 align-items-center mb-3 ">
              <img src="{{ asset('like-icon.svg') }}" alt="like">
              <p class="p-0 m-0">{{$gl->like}}</p>
            </button>
            @else
            <button class="bg-transparent border-0 d-flex gap-3 align-items-center mb-3" style="pointer-events: none;">
              <img src="{{ asset('like-icon-fill.svg') }}" alt="like">
              <p class="p-0 m-0">{{$gl->like}}</p>
            </button>
            @endif
          </div>

        </div>
        @empty
        <div class="h-100 w-100 d-flex justify-content-center align-items-center ">
          <h1>Empty!</h1>
        </div>
        @endforelse
      </div>
      <div class="mt-4 w-100 d-flex justify-content-center ">
        {{ $gls->links('vendor.livewire.bootstrap') }}
      </div>
      @endif
    </div>


  </div>

  {{-- !! CC Modal --}}
  <div wire:ignore.self class="modal modal-lg fade" id="ccModal" tabindex="-1" aria-labelledby="ccModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="ccModalLabel">Add Crash Course</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form onsubmit="close_cc()" wire:submit="addCC" class="modal-body">
          <div class="form-floating mb-3">
            <input wire:model="form_cc.title" type="text" class="form-control" id="cctitle" placeholder="abc" required>
            <label for="cctitle">Title</label>
          </div>
          <div class="form-floating mb-3">
            <input wire:model="form_cc.yt_code" type="text" class="form-control" id="ccytcode" placeholder="abc" required>
            <label for="ccytcode">Youtube Code</label>
          </div>
          <div class="d-flex gap-3">
            <div class="form-floating mb-3 w-100">
              <select wire:model.live="education_level_input" id="education_level" class="form-select" required>
                <option selected>--Select--</option>
                <option value="primary">Primary</option>
                <option value="secondary">Secondary</option>
                <option value="pre-u">Pre-U</option>
                <option value="university">University</option>
              </select>
              <label for="education_level">Education Level</label>
            </div>
            @if($education_level_input == 'primary')
            <div class="form-floating mb-3 w-100">
              <select wire:model="form_cc.year" class="form-select" required>
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
            @elseif ($education_level_input == 'secondary')
            <div class="form-floating mb-3 w-100">
              <select wire:model="form_cc.year" class="form-select" required>
                <option id="year" selected>--Select--</option>
                <option value="1">Form 1</option>
                <option value="2">Form 2</option>
                <option value="3">Form 3</option>
                <option value="4">Form 4</option>
                <option value="5">Form 5</option>
              </select>
              <label for="year">Year</label>
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
          @if($inputMajor == "other")
          <div class="form-floating mb-3">
            <input wire:model="newMajor" type="text" class="form-control" id="newMajor" placeholder="new major" required>
            <label for="newMajor">New Major</label>
          </div>
          @endif
          <div class="form-floating">
            <textarea wire:model="form_cc.description" rows="5" class="form-control h-100" id="ccdescription" placeholder="abc" required> </textarea>
            <label for="ccdescription">Description</label>
          </div>
          <button id="submit_cc" type="submit" class="d-none">submit</button>
        </form>
        <div class="modal-footer">
          <button id="close_cc" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button onclick="submit_cc()" type="button" class="btn btn-primary">Add</button>
        </div>
      </div>
    </div>
  </div>

  {{-- !! Webinar Modal --}}
  <div wire:ignore.self class="modal fade" id="webinarModal" tabindex="-1" aria-labelledby="webinarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="webinarModalLabel">Add Webinar</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form onsubmit="close_webinar()" wire:submit="addWebinar" class="modal-body">
          <div class="form-floating mb-3">
            <input wire:model="form_webinar.title" type="text" class="form-control" id="cctitle" placeholder="abc" required>
            <label for="cctitle">Title</label>
          </div>
          <div class="form-floating mb-3">
            <input wire:model="form_webinar.yt_code" type="text" class="form-control" id="ccytcode" placeholder="abc" required>
            <label for="ccytcode">Youtube Code</label>
          </div>
          <div class="d-flex gap-3">
            <div class="form-floating mb-3 w-100">
              <select wire:model.live="education_level_input" id="education_level" class="form-select" required>
                <option selected>--Select--</option>
                <option value="primary">Primary</option>
                <option value="secondary">Secondary</option>
                <option value="pre-u">Pre-U</option>
                <option value="university">University</option>
              </select>
              <label for="education_level">Education Level</label>
            </div>
            @if($education_level_input == 'primary')
            <div class="form-floating mb-3 w-100">
              <select wire:model="form_webinar.year" class="form-select" required>
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
            @elseif ($education_level_input == 'secondary')
            <div class="form-floating mb-3 w-100">
              <select wire:model="form_webinar.year" class="form-select" required>
                <option id="year" selected>--Select--</option>
                <option value="1">Form 1</option>
                <option value="2">Form 2</option>
                <option value="3">Form 3</option>
                <option value="4">Form 4</option>
                <option value="5">Form 5</option>
              </select>
              <label for="year">Year</label>
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
          @if($inputMajor == "other")
          <div class="form-floating mb-3">
            <input wire:model="newMajor" type="text" class="form-control" id="newMajor" placeholder="new major" required>
            <label for="newMajor">New Major</label>
          </div>
          @endif
          <div class="form-floating mb-3 w-100">
            <select wire:model="form_webinar.type" class="form-select" required>
              <option id="type" selected>--Select--</option>
              <option value="previous">Previous</option>
              <option value="streaming">Streaming</option>
            </select>
            <label for="type">Type</label>
          </div>
          <div class="form-floating">
            <textarea wire:model="form_webinar.description" rows="5" class="form-control h-100" id="ccdescription" placeholder="abc" required> </textarea>
            <label for="ccdescription">Description</label>
          </div>
          <button id="submit_webinar" type="submit" class="d-none">submit</button>
        </form>
        <div class="modal-footer">
          <button id="close_webinar" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button onclick="submit_webinar()" type="button" class="btn btn-primary">Add</button>
        </div>
      </div>
    </div>
  </div>

  {{-- !! GL Modal --}}
  <div wire:ignore.self class="modal fade" id="glModal" tabindex="-1" aria-labelledby="glModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="glModalLabel">Add Crash Course</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form onsubmit="close_gl()" wire:submit="addGL" class="modal-body">
          <div class="form-floating mb-3">
            <input wire:model="form_gl.title" type="text" class="form-control" id="cctitle" placeholder="abc" required>
            <label for="cctitle">Title</label>
          </div>
          <div class="form-floating mb-3">
            <input wire:model="form_gl.yt_code" type="text" class="form-control" id="ccytcode" placeholder="abc" required>
            <label for="ccytcode">Youtube Code</label>
          </div>
          <div class="d-flex gap-3">
            <div class="form-floating mb-3 w-100">
              <select wire:model.live="education_level_input" id="education_level" class="form-select" required>
                <option selected>--Select--</option>
                <option value="primary">Primary</option>
                <option value="secondary">Secondary</option>
                <option value="pre-u">Pre-U</option>
                <option value="university">University</option>
              </select>
              <label for="education_level">Education Level</label>
            </div>
            @if($education_level_input == 'primary')
            <div class="form-floating mb-3 w-100">
              <select wire:model="form_gl.year" class="form-select" required>
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
            @elseif ($education_level_input == 'secondary')
            <div class="form-floating mb-3 w-100">
              <select wire:model="form_gl.year" class="form-select" required>
                <option id="year" selected>--Select--</option>
                <option value="1">Form 1</option>
                <option value="2">Form 2</option>
                <option value="3">Form 3</option>
                <option value="4">Form 4</option>
                <option value="5">Form 5</option>
              </select>
              <label for="year">Year</label>
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
          @if($inputMajor == "other")
          <div class="form-floating mb-3">
            <input wire:model="newMajor" type="text" class="form-control" id="newMajor" placeholder="new major" required>
            <label for="newMajor">New Major</label>
          </div>
          @endif
          <div class="form-floating">
            <textarea wire:model="form_gl.description" rows="5" class="form-control h-100" id="gldescription" placeholder="abc" required> </textarea>
            <label for="gldescription">Description</label>
          </div>
          <button id="submit_gl" type="submit" class="d-none">submit</button>
        </form>
        <div class="modal-footer">
          <button id="close_gl" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button onclick="submit_gl()" type="button" class="btn btn-primary">Add</button>
        </div>
      </div>
    </div>
  </div>


  {{-- ! Lecture Note Modal --}}
  <div wire:ignore.self class="modal modal-lg fade" id="LectureNoteModal" tabindex="-1" aria-labelledby="LectureNoteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="LectureNoteModalLabel">Add Community Note</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form onsubmit="close_ln()" wire:submit="addLN" class="modal-body">
          <div class="form-floating mb-3">
            <input wire:model="form_ln.title" type="text" class="form-control" id="cctitle" placeholder="abc" required>
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
              <select wire:model="form_ln.year" class="form-select" required>
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
            @elseif ($education_level_input == 'secondary')
            <div class="form-floating mb-3 w-100">
              <select wire:model="form_ln.year" class="form-select" required>
                <option id="year" selected>--Select--</option>
                <option value="1">Form 1</option>
                <option value="2">Form 2</option>
                <option value="3">Form 3</option>
                <option value="4">Form 4</option>
                <option value="5">Form 5</option>
              </select>
              <label for="year">Year</label>
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
          @if($inputMajor == "other")
          <div class="form-floating mb-3">
            <input wire:model="newMajor" type="text" class="form-control" id="newMajor" placeholder="new major" required>
            <label for="newMajor">New Major</label>
          </div>
          @endif
          <div class="form-floating mb-3">
            <textarea wire:model="form_ln.description" rows="5" class="form-control h-100" id="ccdescription" placeholder="abc" required> </textarea>
            <label for="ccdescription">Description</label>
          </div>
          <div class="mb-3">
            <label for="paper" class="form-label">Note</label>
            <input wire:model="form_ln.note_url" class="form-control" type="file" accept=".pdf" id="paper" required>
          </div>
          <button id="submit_ln" type="submit" class="d-none">submit</button>

        </form>

        <div class="modal-footer">
          <button id="close_ln" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button onclick="submit_ln()" type="button" class="btn btn-primary">Add</button>
        </div>
      </div>
    </div>
  </div>

  {{-- ! Tutorial Modal --}}
  <div wire:ignore.self class="modal modal-lg fade" id="TutorialModal" tabindex="-1" aria-labelledby="TutorialModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="TutorialModalLabel">Add Tutorial</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form onsubmit="close_tutorial()" wire:submit="addTutorial" class="modal-body">
          <div class="form-floating mb-3">
            <input wire:model="form_tutorial.title" type="text" class="form-control" id="cctitle" placeholder="abc" required>
            <label for="cctitle">Title</label>
          </div>
          <div class="form-floating mb-3 w-100">
            <select wire:model="form_tutorial.type" id="type" class="form-select" required>
              <option selected value="">--Select--</option>
              <option value="free">Free</option>
              <option value="subcribe">Subcribe</option>
            </select>
            <label for="type">Type</label>
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
              <select wire:model="form_tutorial.year" class="form-select" required>
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
            @elseif ($education_level_input == 'secondary')
            <div class="form-floating mb-3 w-100">
              <select wire:model="form_tutorial.year" class="form-select" required>
                <option id="year" selected>--Select--</option>
                <option value="1">Form 1</option>
                <option value="2">Form 2</option>
                <option value="3">Form 3</option>
                <option value="4">Form 4</option>
                <option value="5">Form 5</option>
              </select>
              <label for="year">Year</label>
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
          @if($inputMajor == "other")
          <div class="form-floating mb-3">
            <input wire:model="newMajor" type="text" class="form-control" id="newMajor" placeholder="new major" required>
            <label for="newMajor">New Major</label>
          </div>
          @endif
          <div class="form-floating mb-3">
            <textarea wire:model="form_tutorial.description" rows="5" class="form-control h-100" id="ccdescription" placeholder="abc" required> </textarea>
            <label for="ccdescription">Description</label>
          </div>
          <div class="mb-3">
            <label for="paper" class="form-label">Tutorial</label>
            <input wire:model="form_tutorial.tutorial_url" class="form-control" type="file" accept=".pdf" id="paper" required>
          </div>
          <button id="submit_tutorial" type="submit" class="d-none">submit</button>

        </form>

        <div class="modal-footer">
          <button id="close_tutorial" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button onclick="submit_tutorial()" type="button" class="btn btn-primary">Add</button>
        </div>
      </div>
    </div>
  </div>


  <script>
    function close_cc() {
      document.getElementById('close_cc').click();
    }

    async function submit_cc() {
      await Swal.fire({
        title: "Do you sure to add this video?"
        , icon: 'warning'
        , showCancelButton: true
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('submit_cc').click();
        }
      })
    }

    const ccModal = document.getElementById('ccModal')
    if (ccModal) {
      ccModal.addEventListener('show.bs.modal', event => {
        let inputs = ccModal.querySelectorAll('input, select, textarea');
        inputs.forEach((input) => {
          input.value = "";
        })
      })
    }

    function close_webinar() {
      document.getElementById('close_webinar').click();
    }

    async function submit_webinar() {
      await Swal.fire({
        title: "Do you sure to add this video?"
        , icon: 'warning'
        , showCancelButton: true
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('submit_webinar').click();
        }
      })
    }

    const webinarModal = document.getElementById('webinarModal')
    if (webinarModal) {
      webinarModal.addEventListener('show.bs.modal', event => {
        let inputs = webinarModal.querySelectorAll('input, select, textarea');
        inputs.forEach((input) => {
          input.value = "";
        })
      })
    }

    function close_gl() {
      document.getElementById('close_gl').click();
    }

    async function submit_gl() {
      await Swal.fire({
        title: "Do you sure to add this video?"
        , icon: 'warning'
        , showCancelButton: true
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('submit_gl').click();
        }
      })
    }

    const glModal = document.getElementById('glModal')
    if (glModal) {
      glModal.addEventListener('show.bs.modal', event => {
        let inputs = glModal.querySelectorAll('input, select, textarea');
        inputs.forEach((input) => {
          input.value = "";
        })
      })
    }

    function close_ln() {
      document.getElementById('close_ln').click();
    }

    async function submit_ln() {
      await Swal.fire({
        title: "Do you sure to add this note?"
        , icon: 'warning'
        , showCancelButton: true
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('submit_ln').click();
        }
      })
    }

    const LectureNoteModal = document.getElementById('LectureNoteModal')
    if (LectureNoteModal) {
      window.addEventListener('show.bs.modal', event => {
        let inputs = LectureNoteModal.querySelectorAll('input, select, textarea');
        inputs.forEach((input) => {
          input.value = "";
        })
      })
    }

    function close_tutorial() {
      document.getElementById('close_tutorial').click();
    }

    async function submit_tutorial() {
      await Swal.fire({
        title: "Do you sure to add this tutorial?"
        , icon: 'warning'
        , showCancelButton: true
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('submit_tutorial').click();
        }
      })
    }

    const TutorialModal = document.getElementById('TutorialModal')
    if (TutorialModal) {
      window.addEventListener('show.bs.modal', event => {
        let inputs = TutorialModal.querySelectorAll('input, select, textarea');
        inputs.forEach((input) => {
          input.value = "";
        })
      })
    }

    window.addEventListener("modal:success", async (event) => {
      await Swal.fire({
        title: `Successfully added the ${event.detail[0].type}!`
        , icon: 'success'
        , showCancelButton: true
        , timer: 2000
      })
    })

  </script>
</div>
