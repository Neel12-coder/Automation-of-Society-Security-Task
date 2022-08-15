@extends('layout.master-mini')

@section('content')
<div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one" style="background-image: url({{ url('assets/images/auth/register.jpg') }}); background-size: cover;">
  <div class="row w-100">
    <div class="col-lg-4 mx-auto">
      <h2 class="text-center mb-4">Member Registeration</h2>
      <div class="auto-form-wrapper">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-left input-group">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-left input-group">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-left">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-md-4 col-form-label text-md-left input-group">{{ __('Mobile Number') }}</label>

                <div class="col-md-6">
                    <input id="phone"  type="tel" class="form-control" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="society_id" class="col-md-4 col-form-label text-md-left input-group">{{ __('Society') }}</label>

                <div class="col-md-6">
                    <select id="society_id" class="form-select" name="society_id" placeholder="Society Id">
                        @foreach ($societies as $society)
                            <option value="{{ $society->society_id }}">{{ $society->society_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <label for="flat_number" class="col-md-4 col-form-label text-md-left input-group">{{ __('Flat Number') }}</label>

                <div class="col-md-6">
                    <input id="flat_number" type="tel" class="form-control" name="flat_number" value="{{ old('flat_number') }}" required autocomplete="flat" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="society_id" class="col-md-4 col-form-label text-md-left input-group">{{ __('Role') }}</label>

                <div class="col-md-6">
                    <select id="role" class="form-select" name="role" placeholder="Role">
    
                        <option value="Member">Member</option>
                        <option value="Admin">Admin</option>
                        <option value="Watchman">Watchman</option>
                        
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="profile_image" class="col-md-4 col-form-label text-md-left input-group">{{ __('Member Image') }}</label>

                <div class="col-md-6">
                    <input type="file" name="profile_image" id="profile_image" required placeholder="Profile Image">
        
                </div>
            </div>

          <!-- <div class="form-group d-flex justify-content-center">
            <div class="form-check form-check-flat mt-0">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" checked> I agree to the terms </label>
            </div>
          </div> -->
          <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
          <div class="text-block text-center my-3">
            <span class="text-small font-weight-semibold">Already have and account ?</span>
            <a href="{{ url('/login') }}" class="text-black text-small">Login</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection