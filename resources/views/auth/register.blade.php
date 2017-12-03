@extends('new.app')

@section('title', 'Sign in')

@section('content')

<div class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-3"> </div>
      <div class="col-md-6">
        <div class="card text-white p-5 bg-dark">
          <div class="card-body">
            <h1 class="mb-4">Register</h1>
            <form method="post"  action="{{ route('register') }}">
              {{ csrf_field() }}


              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"> <label>Email address</label>
                <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> <label>Name</label>
                <input id="name" type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                  <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}"> <label>Username</label>
                <input id="username" type="text" class="form-control" placeholder="username" name="username" value="{{ old('username') }}" required autofocus>

                @if ($errors->has('username'))
                  <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"> <label>Password</label>
                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}"> <label>Password</label>
                <input id="password" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>

                @if ($errors->has('password_confirmation'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                  </span>
                @endif
              </div>
              <button type="submit" class="btn btn-primary">Register</button>
               <a class="btn btn-link color-primary float-right" href="{{ route('login') }}">
                Sign in
              </a>
            </form>






          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
