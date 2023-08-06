@extends('layouts.head_foot')
@section('title', 'Register')
@section('templatecontent')
<br>
<br>

<section class="sign-in-page">
            <div class="container p-0">
                <div class="row no-gutters height-self-center">
                  <div class="col-sm-12 align-self-center page-content rounded">
                    <div class="row m-0">
                      <div class="col-sm-12 sign-in-page-data">
                          <div class="sign-in-from bg-primary rounded">
                              <h3 class="mb-0 text-center text-white">{{ __('Register') }} </h3>
                              <p class="text-center text-white">Enter your email address and password to access admin panel.</p>
                    <form class="mt-4 form-text" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3 form-group">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control mb-0 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 form-group">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control mb-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 form-group">
                            <label for="contact" class="col-md-4 col-form-label text-md-end">{{ __('Contact') }}</label>
                        <div class="col-md-6">
                                <input id="phone" type="number" class="form-control mb-0 @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 form-group">
                            <label for="country" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>
                        <div class="col-md-6">
                                <input id="country" type="country" class="form-control mb-0 @error('contact') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country">

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 form-group">
                            <label for="city" class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>
                        <div class="col-md-6">
                                <input id="city" type="city" class="form-control mb-0 @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city">

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3 form-group">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control mb-0 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 form-group">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control mb-0" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="d-inline-block w-100">
                                      <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                          <input type="checkbox" class="custom-control-input" id="customCheck1">
                                          <label class="custom-control-label" for="customCheck1">I accept <a href="#" class="text-light">Terms and Conditions</a></label>
                                      </div>
                                  </div>
                        <div class="row mb-0 form-group">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-white d-block w-100 mb-2">
                                    {{ __('Register') }}
                                </button>
                                <span class="text-dark d-inline-block line-height-2">Already Have Account ? <a href="{{ route('login') }}" class="text-white">Log In</a></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
     </div>
        </div>
</section>
<br>
<br>

@endsection
