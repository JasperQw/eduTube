<div class="h-100 overflow-scroll" style="padding-bottom: 10rem;">
  <style>
    .scholarship-bg {
      width: 100%;
      height: 20rem;
      background-image: url('/scholarship.jpg');
      background-position-y: -20rem;
    }

    .loan-bg {
      width: 100%;
      height: 20rem;
      background-image: url('/loan.jpg');
      background-position-y: -20rem;
    }

  </style>
  <div class="scholarship-bg"></div>
  <div class="px-5 ">
    <h3 class="mb-5 mt-5 fw-bolder w-100 px-3">Scholarships Listing</h3>
    <table class="table table-hover">
      <thead>
        <tr>
          <th class="text-center">#</th>
          <th class="text-center">Link</th>
          <th class="text-center">Start</th>
          <th class="text-center">End</th>
        </tr>
      </thead>
      <tbody>


        @forelse($scholarships as $scholarship)
        <tr>
          <td class="text-center">
            {{$loop->iteration}}
          </td>
          <td class="text-center"><a href="{{$scholarship->link}}" target="_blank">{{$scholarship->name}}</a></td>
          <td class="text-center">{{$scholarship->start}}</td>
          <td class="text-center">{{$scholarship->end}}</td>
        </tr>
        @empty
        <tr>
          <td colspan="4">Empty!</td>
        </tr>
        @endforelse



      </tbody>
    </table>
    <div class="mt-4 mb-4 w-100 d-flex justify-content-center ">
      {{ $scholarships->links('vendor.livewire.bootstrap') }}
    </div>
  </div>
  <div class="loan-bg"></div>
  <div class="px-5 ">
    <h3 class="mb-5 mt-5 fw-bolder">Loan Listing</h3>
    <table class="table table-hover">
      <thead>
        <tr>
          <th class="text-center">#</th>
          <th class="text-center">Link</th>
          <th class="text-center">Start</th>
          <th class="text-center">End</th>
        </tr>
      </thead>
      <tbody>

        @forelse($loans as $loan)
        <tr>
          <td class="text-center">
            {{$loop->iteration}}
          </td>
          <td class="text-center"><a href="{{$loan->link}}" target="_blank">{{$loan->name}}</a></td>
          <td class="text-center">{{isset($loan->start) ? $loan->start : "No Specify"}}</td>
          <td class="text-center">{{isset($loan->end) ? $loan->end : "No Specify"}}</td>
        </tr>
        @empty
        <tr>
          <td colspan="2">Empty!</td>
        </tr>
        @endforelse

      </tbody>
    </table>
    <div class="mt-4 w-100 d-flex justify-content-center ">
      {{ $loans->links('vendor.livewire.bootstrap') }}
    </div>
  </div>

</div>
