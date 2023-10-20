@extends('layouts.app')

@section('content')
<div class="d-flex w-100 h-100">
  <style>
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

    .lofi-login {
      background-image: url('/lofi-girl-login.gif');
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-size: cover;
      background-position: -25rem;
    }

  </style>
  <div class="lofi-login flex-grow-1 "></div>
  <div class="flex-grow-1 d-flex justify-content-center align-content-center ">
    <form class=" d-flex flex-column justify-content-center col-6 gap-3" method="POST" action="{{ route('login') }}">
      @csrf

      <div>
        <h3 class="fw-bolder ">Login</h3>
        <p class="text-secondary text-opacity-75 ">Login to access all features</p>
      </div>

      <div>
        <div class="form-floating mb-3">
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="emailInput" name="email" placeholder="name@example.com" value="{{ old('email') }}" required autocomplete="email" autofocus>
          <label for="emailInput">Email</label>
          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="passwordInput" placeholder="password" name="password" required autocomplete="current-password">
          <label for="passwordInput">Password</label>
          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="d-flex gap-4 align-items-center ">
        @if (Route::has('password.request'))
        <a class="w-100 link-dark " href="{{ route('password.request') }}">Forget Your Password?</a>
        @endif
        <button type="submit" class="button-27">Login</button>
      </div>
      <a class="mt-4" href="{{route('register')}}">Don't have an account?</a>
    </form>
  </div>
</div>
@endsection
