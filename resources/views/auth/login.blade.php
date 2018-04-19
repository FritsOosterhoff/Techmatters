@extends('techmatters.app')

@section('title', 'Sign in')

@section('content')


<section class="col-md-6 mx-auto">
  <div class="card bg-light text-dark p-5 ">
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
</section>



@endsection
