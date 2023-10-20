<div class="h-100 w-100 pt-4" style="padding-bottom: 4.5rem;">
  <style>
    .grid-container {
      display: grid;
      grid-gap: 3rem;
      grid-template-columns: repeat(auto-fit, minmax(18rem, 1fr));
      justify-items: center;
      align-items: center;
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

  </style>
  <div class="w-100 d-flex justify-content-between  px-2">
    <div style="width: 20rem;" class="mb-3 mx-5">
      <select wire:model.live="education_level" class="form-select">
        <option selected value="">Education Level</option>
        <option value="kindergarten">Kindergarten</option>
        <option value="primary">Primary</option>
        <option value="secondary">Secondary</option>
        <option value="pre-u">Pre-U</option>
        <option value="university">University</option>
      </select>
    </div>

    <div style="width: 20rem;" class="input-group mb-3 mx-5">
      <span class="input-group-text" id="basic-addon1">Search</span>
      <input wire:model.live="search" type="text" class="form-control" placeholder="Search books..." aria-label="search" aria-describedby="search-1">
    </div>
  </div>

  <div class="h-100 w-100 px-5 grid-container pb-5 overflow-scroll">
    @forelse ($items as $item)
    <div class="card" style="width: 18rem; height: 32rem;">
      <img src="{{ asset($item->image) }}" class="card-img-top object-fit-cover " style="height: 18rem; max-height: 18rem; min-height: 18rem;" alt="book image">
      <div class="card-body d-flex flex-column ">
        <h5 class="card-title text-truncate ">{{$item->name}}</h5>
        <p class="card-text fw-light flex-grow-1 ">RM {{$item->price}}</p>
        <div class="d-flex gap-3 align-items-center mb-3">
          <a href="/user-profile/{{$item->user->id}}"><img class="avatar" src="{{asset($item->user->profile_image)}}" alt="user_image"></a>
          <p class="m-0 p-0">{{$item->user->name}}</p>
        </div>
        <a href="/trading/{{$item->id}}" class="btn btn-primary">Detail</a>
      </div>
    </div>
    @empty
    <div class="h-100 w-100 d-flex justify-content-center align-items-center ">
      <h1 class="fw-bold ">No Books!</h1>
    </div>
    @endforelse



  </div>
</div>
