<div class="h-100 w-100 pt-4" style="padding-bottom: 4.5rem;">
  <div class="h-100 w-100 px-5 pb-5 d-flex justify-content-center align-items-center ">
    <div class="d-flex gap-5">
      <div class="">
        <img src="{{ asset($item->image) }}" class="card-img-top" style="width: 25rem; height: 30rem;" alt="background image">
      </div>
      <div class="d-flex flex-column ">
        <h2>{{$item->name}}</h2>
        <p>Condition: {{$item->condition}}/10</p>
        <p class="mt-2 text-secondary ">Description</p>
        <p class="flex-grow-1 ">{!! nl2br(e($item->description)) !!}</p>

        <div class="text-end">
          <button class="btn btn-outline-dark px-5 py-2" data-bs-toggle="modal" data-bs-target="#editDonationModal">Edit</button>
          <button onclick="remove()" class="btn btn-danger px-5 py-2">Remove</button>
        </div>
      </div>
    </div>
  </div>

  {{-- ! Trading Modal --}}
  <div wire:ignore.self class="modal modal-lg fade" id="editDonationModal" tabindex="-1" aria-labelledby="editDonationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editDonationModalLabel">Edit Donation</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form onsubmit="close_donation()" wire:submit="editDonation" class="modal-body">
          <div class="form-floating mb-3">
            <input wire:model="form.name" type="text" class="form-control" id="name" placeholder="abc" required>
            <label for="name">Title</label>
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
            <div class="form-floating mb-3 w-100">
              <select wire:model="form.condition" id="condition" class="form-select" required>
                <option selected value="">--Select--</option>
                @for($i = 1; $i <= 10; $i++) <option value="{{$i}}">{{$i}}</option>
                  @endfor


              </select>
              <label for="condition">Condition</label>
            </div>
          </div>

          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input id="image-upload" wire:model="form.image" class="form-control" type="file" accept="image/*" id="image">
          </div>

          <div class="form-floating">
            <textarea wire:model="form.description" rows="5" class="form-control h-100" id="ccdescription" placeholder="abc" required> </textarea>
            <label for="ccdescription">Description</label>
          </div>
          <button id="submit_donation" type="submit" class="d-none">submit</button>
        </form>
        <div class="modal-footer">
          <button id="close_donation" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button onclick="submit_donation()" type="button" class="btn btn-primary">Add</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    async function remove() {
      await Swal.fire({
        title: "Do you sure to remove this trade?"
        , icon: 'warning'
        , showCancelButton: true
      }).then(result => {
        if (result.isConfirmed) {
          @this.removeDonation();
        }
      })
    }

    function close_donation() {
      document.getElementById('close_donation').click();
    }

    async function submit_donation() {
      await Swal.fire({
        title: "Do you sure to edit this trade?"
        , icon: 'warning'
        , showCancelButton: true
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('submit_donation').click();
        }
      })
    }

    const editDonationModal = document.getElementById('editDonationModal')
    if (editDonationModal) {
      editDonationModal.addEventListener('show.bs.modal', event => {

        let trade_item = @json($item);

        @this.form.name = trade_item.name;
        @this.form.description = trade_item.description;
        @this.form.condition = trade_item.condition;
        @this.form.education_level = trade_item.education_level;
        document.getElementById('image-upload').value = null;
      })
    }

    window.addEventListener("modal:success", async (event) => {
      await Swal.fire({
        title: `Successfully edited the trade!`
        , icon: 'success'
        , showCancelButton: true
        , timer: 2000
      })
    })

  </script>
</div>
