<div class="w-100 h-100 d-flex py-4">
  <style>
    /* CSS */
    .button-27 {
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
      min-height: 60px;
      min-width: 0;
      outline: none;
      padding: 16px 24px;
      text-align: center;
      text-decoration: none;
      transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
      user-select: none;
      -webkit-user-select: none;
      touch-action: manipulation;
      width: 100%;
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

    /* CSS */
    .button-17 {
      align-items: center;
      appearance: none;
      background-color: #fff;
      border-radius: 24px;
      border-style: none;
      box-shadow: rgba(0, 0, 0, .2) 0 3px 5px -1px, rgba(0, 0, 0, .14) 0 6px 10px 0, rgba(0, 0, 0, .12) 0 1px 18px 0;
      box-sizing: border-box;
      color: #3c4043;
      cursor: pointer;
      display: inline-flex;
      fill: currentcolor;
      font-family: "Google Sans", Roboto, Arial, sans-serif;
      font-size: 14px;
      font-weight: 500;
      height: 48px;
      justify-content: center;
      letter-spacing: .25px;
      line-height: normal;
      max-width: 100%;
      overflow: visible;
      padding: 2px 24px;
      position: relative;
      text-align: center;
      text-transform: none;
      transition: box-shadow 280ms cubic-bezier(.4, 0, .2, 1), opacity 15ms linear 30ms, transform 270ms cubic-bezier(0, 0, .2, 1) 0ms;
      user-select: none;
      -webkit-user-select: none;
      touch-action: manipulation;
      width: auto;
      will-change: transform, opacity;
      z-index: 0;
    }

    .button-17:hover {
      background: #F6F9FE;
      color: #174ea6;
    }

    .button-17:active {
      box-shadow: 0 4px 4px 0 rgb(60 64 67 / 30%), 0 8px 12px 6px rgb(60 64 67 / 15%);
      outline: none;
    }



    .button-17:not(:disabled) {
      box-shadow: rgba(60, 64, 67, .3) 0 1px 3px 0, rgba(60, 64, 67, .15) 0 4px 8px 3px;
    }

    .button-17:not(:disabled):hover {
      box-shadow: rgba(60, 64, 67, .3) 0 2px 3px 0, rgba(60, 64, 67, .15) 0 6px 10px 4px;
    }

    .button-17:not(:disabled):focus {
      box-shadow: rgba(60, 64, 67, .3) 0 1px 3px 0, rgba(60, 64, 67, .15) 0 4px 8px 3px;
    }

    .button-17:not(:disabled):active {
      box-shadow: rgba(60, 64, 67, .3) 0 4px 4px 0, rgba(60, 64, 67, .15) 0 8px 12px 6px;
    }

    .button-17:disabled {
      box-shadow: rgba(60, 64, 67, .3) 0 1px 3px 0, rgba(60, 64, 67, .15) 0 4px 8px 3px;
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
      justify-content: space-between;
      padding-inline: 1rem;
      padding-bottom: 2.5rem;
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
      padding-bottom: 1.3rem;

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
          <a role="button" href="{{ route('discussion-community') }}" class="btn w-100 text-start  selected-route">Discussion Community</a>
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
          <button class="nav-link @if($section == 'chatroom') active @endif" wire:click="changeSection('chatroom')">Chatroom</button>
        </li>
        <li class="nav-item">
          <button class="nav-link @if($section == 'meetings') active @endif" wire:click="changeSection('meetings')">Meetings</button>
        </li>
      </ul>
    </div>
    @if($section == 'chatroom')
    {{-- ! Chatroom --}}

    <div class="content-inside">
      <div id="chatbody" class="d-flex px-3 flex-column gap-4 h-100 overflow-scroll" style="@if($canChat == true) height: 30rem; min-height: 30rem; max-height: 30rem; @else height: 36.5rem; min-height: 36.5rem; max-height: 36.5rem; @endif">
        @forelse($chats as $chat)
        @if($chat->user_id == $user_id)
        <div class="d-flex gap-4 justify-content-end ">
          <div class="border border-2 px-3 py-2 rounded-3 border-dark border-opacity-25">
            {{$chat->message}}
          </div>
          <a href="/user-profile/{{$chat->user->id}}"><img class="avatar" src="{{ asset($chat->user->profile_image) }}" alt="thumbnail"></a>
        </div>
        @else

        <div class="d-flex gap-4 justify-content-start ">
          <a href="/user-profile/{{$chat->user->id}}"><img class="avatar" src="{{ asset($chat->user->profile_image) }}" alt="thumbnail"></a>
          <div class="border border-2 px-3 py-2 rounded-3 border-dark border-opacity-25">
            {!! nl2br(e($chat->message)) !!}
          </div>
        </div>
        @endif

        @empty

        <div class="h-100 w-100 d-flex justify-content-center align-items-center ">
          <h1>Empty!</h1>
        </div>
        @endforelse
      </div>

      @if($canChat == true)
      <form wire:submit="addMessage" class="px-3 mt-4 mb-3 d-flex gap-3 align-items-end ">
        <button class="button-17" role="button"><img src="{{ asset('upload-image.svg') }}" alt=""></button>
        <button class="button-17" role="button"><img src="{{ asset('upload-file.svg') }}" alt=""></button>
        <textarea id="message" wire:model="message" class="form-control " style="resize: none;" placeholder="Enter your message here!"></textarea>
        <button onclick="clearText()" class="button-27" type="submit" style="width: 10rem;" role="button">Send</button>
      </form>

      @endif
    </div>
    @else
    {{-- ! Meeting --}}
    <div class="content-inside">
      <div class="d-flex px-3 flex-grow-1 flex-column gap-4 h-100 overflow-scroll" style="@if($canChat == true) height: 30rem; min-height: 30rem; max-height: 30rem; @else height: 36.5rem; min-height: 36.5rem; max-height: 36.5rem; @endif">

        @forelse ($meetings as $meeting)
        @if($meeting->user_id != Auth::user()->id)
        <div class="d-flex gap-4">
          <a href="/user-profile/{{$meeting->user->id}}"><img class="avatar" src="{{ asset($meeting->user->profile_image) }}" alt="thumbnail"></a>
          <div class="border border-2 px-3 py-2 rounded-3 border-dark border-opacity-25 d-flex flex-column gap-3 py-3">
            <div>
              <h3>{{$meeting->title}}</h3>
              <p class="text-body-secondary  ">Time: {{$meeting->start}} to {{$meeting->end}}</p>
            </div>
            <p>
              {{$meeting->description}}
            </p>

            <div class="w-100 text-end">
              <a href="{{$meeting->link}}" role="button" class="button-27 py-3" style="width: 12rem; min-height: 2rem;">Join Meeting</a>
            </div>
            {{-- <p>Link: <a href="{{$meeting->link}}">{{$meeting->link}}</a></p> --}}
          </div>
        </div>
        @else
        <div class="d-flex gap-4 justify-content-end">

          <div class="border border-2 px-3 py-2 rounded-3 border-dark border-opacity-25 d-flex flex-column gap-3 py-3">
            <div>
              <h3>{{$meeting->title}}</h3>
              <p class="text-body-secondary  ">Time: {{$meeting->start}} to {{$meeting->end}}</p>
            </div>
            <p>
              {{$meeting->description}}
            </p>

            <div class="w-100 text-end">
              <a href="{{$meeting->link}}" role="button" class="button-27 py-3" style="width: 12rem; min-height: 2rem;">Join Meeting</a>
            </div>

            {{-- <p>Link: <a href="{{$meeting->link}}">{{$meeting->link}}</a></p> --}}
          </div>
          <img class="avatar" src="{{ asset($meeting->user->profile_image) }}" alt="thumbnail">
        </div>
        @endif

        @empty
        <div class="h-100 w-100 d-flex justify-content-center align-items-center ">
          <h1>Empty!</h1>
        </div>
        @endforelse

      </div>


      @if($canChat == true)
      <div class="px-3 mt-4 mb-3 d-flex gap-3 align-items-center justify-content-center ">
        <button class="button-27" role="button" data-bs-toggle="modal" data-bs-target="#meetingsModal">Create New Meeting!</button>
      </div>
      @endif
      @endif
    </div>

    {{-- !! Meeting Modal --}}
    <div class="modal fade modal-lg" id="meetingsModal" tabindex="-1" aria-labelledby="meetingsModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="meetingsModalTitle">Add Meeting</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="meetingsForm" onsubmit="closeModal()" wire:submit="addMeetings" class="modal-body">
            <div class="form-floating mb-3">
              <input wire:model="form_meeting.title" type="text" class="form-control" id="title" placeholder="abc" required>
              <label for="title">Title</label>
            </div>
            <div class="d-flex gap-3 mb-3 w-100 ">
              <div class="w-100 d-flex flex-column ">
                <small>Start</small>
                <input wire:model="form_meeting.start" type="datetime-local" class="px-3 py-2 border-opacity-25 border-secondary rounded-3 border-1" id="start" required>
              </div>
              <div class="w-100 d-flex flex-column">
                <small>End</small>
                <input wire:model="form_meeting.end" type="datetime-local" class="px-3 py-2 border-opacity-25 border-secondary rounded-3 border-1" id="end" required>
              </div>
            </div>
            <div class="form-floating mb-3">
              <textarea wire:model="form_meeting.description" rows="5" class="form-control h-100" id="description" placeholder="abc" required> </textarea>
              <label for="description">Description</label>
            </div>
            <div class="form-floating mb-3">
              <input wire:model="form_meeting.link" type="text" class="form-control" id="link" placeholder="abc" required>
              <label for="link">Link</label>
            </div>
            <button id="submitForm" type="submit" class="d-none">submit</button>
          </form>
          <div class="modal-footer">
            <button id="closeModal" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button onclick="submitMeetings()" type="button" class="btn btn-primary">Add</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    let meetingsModal = document.getElementById('meetingsModal');

    if (meetingsModal) {

      window.addEventListener('show.bs.modal', (event) => {
        let meetingsForm = document.getElementById('meetingsForm');
        let inputs = meetingsForm.querySelectorAll('input, textarea');
        inputs.forEach((input) => {
          input.value = "";
        })
      })
    }

    async function submitMeetings() {
      await Swal.fire({
        title: "Are you sure to add the meeting?"
        , icon: "warning"
        , showCancelButton: true
      }).then(result => {
        if (result.isConfirmed) {
          document.getElementById('submitForm').click();
        }
      })
    }

    function closeModal() {
      document.getElementById('closeModal').click();
    }

    let chatbody = document.querySelector('#chatbody');
    chatbody.scrollTop = chatbody.scrollHeight - chatbody.clientHeight;

    function clearText() {
      const message = document.getElementById('message');
      message.value = '';
    }

    document.addEventListener('livewire:initialized', () => {
      @this.on('scrollToBottom', (event) => {
        let chatbody = document.getElementById('chatbody');
        if (chatbody) {
          chatbody.scrollTop = chatbody.scrollHeight - chatbody.clientHeight;
        }

      });
    });

    window.addEventListener("modal:success", async (event) => {
      await Swal.fire({
        title: `Successfully added the meeting!`
        , icon: 'success'
        , showCancelButton: true
        , timer: 2000
      })
    })

  </script>
</div>
