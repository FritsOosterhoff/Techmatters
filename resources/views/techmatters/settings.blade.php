@extends('techmatters.app')

@section('title', 'Sign in')

@section('content')

<section class="col-md-8 mx-auto">

  <div class="card text-dark p-5 bg-light">
    <div class="card-body">
      <h1 class="mb-4">Settings</h1>
      <form method="post"  action="{{ url('settings') }}">
        {{ csrf_field() }}


        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"> <label>Email address</label>
          <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ $user->email }}" required autofocus>

          @if ($errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> <label>Name</label>
          <input id="name" type="text" class="form-control" placeholder="Name" name="name" value="{{ $user->name }}" required autofocus>

          @if ($errors->has('name'))
          <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}"> <label>Username</label>
          <input id="username" type="text" class="form-control" placeholder="username" name="username" value="{{ $user->username }}" required autofocus>

          @if ($errors->has('username'))
          <span class="help-block">
            <strong>{{ $errors->first('username') }}</strong>
          </span>
          @endif
        </div>

        <div class="form-group{{ $errors->has('biography') ? ' has-error' : '' }}"> <label>Biography</label>
          <textarea id="biography" type="text" class="form-control" placeholder="biography" name="biography"  required autofocus> {{ $user->biography }}</textarea>

          @if ($errors->has('biography'))
          <span class="help-block">
            <strong>{{ $errors->first('biography') }}</strong>
          </span>
          @endif
        </div>


        <button type="submit" class="btn btn-primary">Apply settings</button>

      </form>

      <hr />
      <form method="post"  action="{{ url('change_password') }}">

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"> <label>Password</label>
          <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

          @if ($errors->has('password'))
          <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
          @endif
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}"> <label>Password</label>
          <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>

          @if ($errors->has('password_confirmation'))
          <span class="help-block">
            <strong>{{ $errors->first('password_confirmation') }}</strong>
          </span>
          @endif
        </div>
        <button type="submit" class="btn btn-primary">Change password</button>
      </form>

      <hr>

      <form enctype="multipart/form-data" action="{{url('profile_avatar')}}" method="POST">

      <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}"> <label>Avatar</label>
        <input  type="file" class="form-control" name="avatar" >

        @if ($errors->has('image'))
        <span class="help-block">
          <strong>{{ $errors->first('image') }}</strong>
        </span>
        @endif
      </div>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="submit" class="pull-right btn btn-sm btn-primary">
      </form>
    </div>
  </div>
</section>

@endsection
