@extends('layouts.app')

@section('content')
<div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
    
          <div class="col-xl-10 col-lg-12 col-md-9">
    
            <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                  <div class="col-lg-6">
                    <div class="p-5">
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Log in</h1>
                      </div>
                      <form class="user" method="POST" action="{{ route('login') }}">
                          @csrf

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          <input id="name" type="text" class="form-control   form-control-user" name="name" value="{{ old('name') }}" required autocomplete="name" aria-describedby="emailHelp" placeholder="Enter Username..." autofocus>
                            @if ($errors->has('name'))
                              <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                              </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? 'has-error' : '' }}">
                          <input id="password" type="password" class="form-control  form-control-user" name="password" required autocomplete="current-password" placeholder="Password">
                            @if ($errors->has('password'))
                              <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                              </span>
                            @endif
                        </div>

                        <div class="form-group">
                          <div class="custom-control custom-checkbox small">
                            <input id="customCheck" class="form-check-input custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >
                            <label class="custom-control-label" for="customCheck">Remember Me</label>
                          </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-user btn-block">
                          Login
                        </button>
                      </form>
                      <hr>
                      {{-- <div class="text-center">
                        <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                      </div>
                      <div class="text-center">
                        <a class="small" href="{{ route('register') }}">Create an Account</a> --}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
          </div>
    
        </div>
    
      </div>
@endsection
