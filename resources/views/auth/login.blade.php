@extends('layouts.app')
@section('style')

<style type="text/css">
    input:focus {
      border-color: green
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- <div class="col-md-8"> -->
        <div class="col-md-12">
            <div class="card">
                <!-- <div class="card-header"></div> -->

                <div class="card-body" style="align-items: center;justify-content: center;padding: 100px">
                    <img src="{{env('API_LINK_CUSTOM_PUBLIC')}}\image\freelance-profile-2.png" width="150px" height="150px" style="display: block;margin: auto;position: relative;">
                    <div style="display: block;margin: auto;position: relative;text-align: center;color: #b3a7db">Sinergy Freelance</div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row" style="padding-top: 10px">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->

                            <!-- <div class="col-md-6" > -->
                            <div style="display: block;margin: auto;position: relative;text-align: center;">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->

                            <!-- <div class="col-md-6"> -->
                            <div style="display: block;margin: auto;position: relative;text-align: center;">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <div class="form-group row mb-0">
                            <!-- <div class="col-md-8 offset-md-4"> -->
                            <div style="display: block;margin: auto;position: relative;text-align: center;">
                                <button type="submit" class="btn btn-primary ">
                                    {{ __('Login') }}
                                </button>

                              <!--   @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
