@extends('new.app')

@section('title', 'Sign in')

@section('content')

<div class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-3"> </div>
      <div class="col-md-6">
        <div class="card text-white p-5 bg-secondary">
          <div class="card-body">
            <h1 class="mb-4">Login</h1>
            <form method="post"  action="{{ route('login') }}">
              {{ csrf_field() }}


              <div class="form-group"> <label>Email address</label>
                <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
              </div>
              <div class="form-group"> <label>Password</label>
                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
              </div>
              <button type="submit" class="btn btn-primary">Login</button>  <a class="btn btn-link color-white float-right" href="{{ route('register') }}">
                Register
              </a>
            </form>






          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
