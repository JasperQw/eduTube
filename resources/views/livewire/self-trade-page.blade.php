<div class="h-100 overflow-scroll pb-5 px-5 py-4">
  <style>
    .grid-container {
      display: grid;
      grid-gap: 3rem;
      grid-template-columns: repeat(auto-fit, minmax(18rem, 1fr));
      justify-items: start;
      align-items: center;
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

  <button class="add-btn" data-bs-toggle="modal" data-bs-target="#tradingModal">
    <p class="p-0 m-0">+</p>
  </button>

  <h3 class="mb-5 ms-2">Current Listing</h3>
  <div class="grid-container pb-5">
    @forelse($avails as $avail)
    <div class="card" style="width: 18rem; height: 30rem;">
      <img src="{{ asset($avail->image) }}" class="card-img-top object-fit-cover " style="height: 18rem;" alt="book image">
      <div class="card-body d-flex flex-column ">
        <h5 class="card-title text-truncate ">{{$avail->name}}</h5>
        <p class="card-text fw-light flex-grow-1 ">RM {{$avail->price}}</p>
        <a href="/self-trading/{{$avail->id}}" class="btn btn-primary">Detail</a>
      </div>
    </div>
    @empty
    <div class="h-100 w-100 d-flex justify-content-center align-items-center ">
      <h1 class="fw-bold ">No Books!</h1>
    </div>
    @endforelse
  </div>

  <h3 class="mb-5 ms-2">History</h3>
  <div class="grid-container pb-5">
    @forelse($not_avails as $not_avail)
    <div class="card" style="width: 18rem; height: 30rem;">
      <img src="{{ asset($not_avail->image) }}" class="card-img-top object-fit-cover " style="height: 18rem;" alt="book image">
      <div class="card-body d-flex flex-column ">
        <h5 class="card-title text-truncate ">{{$not_avail->name}}</h5>
        <p class="card-text fw-light flex-grow-1 ">RM {{$not_avail->price}}</p>
        <a href="/self-trading/{{$not_avail->id}}" class="btn btn-primary">Detail</a>
      </div>
    </div>
    @empty
    <div class="h-100 w-100 d-flex justify-content-center align-items-center ">
      <h1 class="fw-bold ">No Books!</h1>
    </div>
    @endforelse
  </div>

  {{-- ! Trading Modal --}}
  <div wire:ignore.self class="modal modal-lg fade" id="tradingModal" tabindex="-1" aria-labelledby="tradingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="tradingModalLabel">Add Trade</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form onsubmit="close_trade()" wire:submit="addtrade" class="modal-body">
          <div class="form-floating mb-3">
            <input wire:model="form.name" type="text" class="form-control" id="name" placeholder="abc" required>
            <label for="name">Title</label>
          </div>
          <div class="d-flex gap-3">
            <div class="form-floating mb-3 w-100">
              <input wire:model="form.price" type="number" class="form-control" id="price" placeholder="" required>
              <label for="price">Price</label>
            </div>
            <div class="form-floating mb-3 w-100">
              <select wire:model="form.condition" id="condition" class="form-select" required>
                <option selected value="">--Select--</option>
                @for($i = 1; $i <= 10; $i++) <option value="{{$i}}">{{$i}}</option>
                  @endfor


              </select>
              <label for="condition">Condition</label>
            </div>
          </div>

          <div class="d-flex gap-3">
            <div class="form-floating mb-3 w-100">
              <select wire:model="form.education_level" id="education_level" class="form-select" required>
                <option selected value="">--Select--</option>
                <option value="primary">Primary</option>
                <option value="secondary">Secondary</option>
                <option value="pre-u">Pre-U</option>
                <option value="university">University</option>
              </select>
              <label for="education_level">Education Level</label>
            </div>

          </div>

          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input wire:model="form.image" class="form-control" type="file" accept="image/*" id="image" required>
          </div>

          <div class="form-floating">
            <textarea wire:model="form.description" rows="5" class="form-control h-100" id="ccdescription" placeholder="abc" required> </textarea>
            <label for="ccdescription">Description</label>
          </div>
          <button id="submit_trade" type="submit" class="d-none">submit</button>
        </form>
        <div class="modal-footer">
          <button id="close_trade" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button onclick="submit_trade()" type="button" class="btn btn-primary">Add</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    function close_trade() {
      document.getElementById('close_trade').click();
    }

    async function submit_trade() {
      await Swal.fire({
        title: "Do you sure to add this trade?"
        , icon: 'warning'
        , showCancelButton: true
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('submit_trade').click();
        }
      })
    }

    const tradingModal = document.getElementById('tradingModal')
    if (tradingModal) {
      tradingModal.addEventListener('show.bs.modal', event => {
        let inputs = tradingModal.querySelectorAll('input, select, textarea');
        inputs.forEach((input) => {
          input.value = "";
        })
      })
    }

    window.addEventListener("modal:success", async (event) => {
      await Swal.fire({
        title: `Successfully added the trade!`
        , icon: 'success'
        , showCancelButton: true
        , timer: 2000
      })
    })

  </script>
</div>
