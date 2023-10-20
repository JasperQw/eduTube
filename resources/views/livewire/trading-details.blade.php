<div class="h-100 w-100 pt-4" style="padding-bottom: 4.5rem;">
  <style>
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
  <div class="h-100 w-100 px-5 pb-5 d-flex justify-content-center align-items-center ">
    <div class="d-flex gap-5">
      <div class="card" style="min-width: 25rem;">
        <img src="{{ asset($item->image) }}" class="card-img-top" style="width: 25rem; height: 30rem;" alt="background image">
      </div>

      <div class="d-flex flex-column ">
        <h2>{{$item->name}}</h2>
        <p>Condition: {{$item->condition}}/10</p>
        <p class="fs-3 fw-bolder">RM {{$item->price}}</p>
        <p class="mt-2 text-secondary ">Description</p>
        <p class="flex-grow-1 ">{!! nl2br(e($item->description)) !!}</p>

        <div class="d-flex justify-content-between ">

          <div class="d-flex gap-3 align-items-center mb-3" style="min-width: 25rem;">
            <a href="/user-profile/{{$item->user->id}}"><img class="avatar" src="{{ asset($item->user->profile_image) }}" alt="user_image"></a>
            <p class="m-0 p-0">{{$item->user->name}}</p>
          </div>
          <button class="btn btn-primary px-5 py-2"> + Add To Cart</button>
        </div>
      </div>
    </div>
  </div>
</div>
