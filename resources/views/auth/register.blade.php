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
      background-image: url('/lofi-boy-register.gif');
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-size: cover;
      background-position: -20rem;
    }

  </style>
  <div class="lofi-login flex-grow-1 "></div>
  <div class="flex-grow-1 d-flex justify-content-center align-content-center ">
    <form class=" d-flex flex-column justify-content-center col-6 gap-3" method="POST" action="{{ route('register') }}">
      @csrf

      <div>
        <h3 class=" fw-bolder ">Sign Up</h3>
        <p class=" text-secondary text-opacity-75 ">Sign up to access all features</p>
      </div>

      <div>

        <div class=" form-floating mb-3">
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="example" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
          <label for="name">{{ __('Name') }}</label>
          @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-floating mb-3">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="example@email.com" name="email" value="{{ old('email') }}" required autocomplete="email">
          <label for="email">{{ __('Email Address') }}</label>
          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-floating mb-3">
          <select id="education_level" class="form-select @error('education_level') is-invalid @enderror" name="education_level" aria-label="Education Level">
            <option selected>--Select--</option>
            <option value="kindergarten">Kindergarten</option>
            <option value="primary">Primary</option>
            <option value="secondary">Secondary</option>
            <option value="pre-u">Pre-U</option>
            <option value="university">University</option>
          </select>
          <label for="education_level">{{ __('Education Level') }}</label>
          @error('education_level')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="d-flex gap-3 w-100">
          <div class="form-floating mb-3 w-100">
            <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" placeholder="" name="birthday" value="{{ old('birthday') }}" required>
            <label for="birthday">{{ __('Birthday') }}</label>
            @error('birthday')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-floating mb-3 w-100">
            <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" placeholder="" value="{{ old('age') }}" required>
            <label for="age">{{ __('Age') }}</label>
            @error('age')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>


        <div class="d-flex gap-3 w-100">
          <div class="form-floating mb-3 flex-grow-1 ">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="" name="password" required autocomplete="new-password">
            <label for="password">{{ __('Password') }}</label>
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-floating mb-3 flex-grow-1 ">
            <input id="password-confirm" type="password" placeholder="" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>
          </div>
        </div>


      </div>

      <div class="d-flex gap-4 align-items-center ">
        <div class="w-100">
          <a class="mt-4" href="{{route('login')}}">Already have an account?</a>
        </div>


        <button type="submit" class="button-27">Sign Up</button>
      </div>

    </form>
  </div>
</div>
@endsection
