@extends('layouts.app')

@section('content')

</div></div>
<style></style>
  <div class="darkblue"  class="section group">

    <div class=" span_12_of_12 center" style="width:50%; margin:0px auto; padding: 40px 0px 120px 0px;">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div><h1 class="color-white">Register</h1></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col span_4_of_12 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="input-primary" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col span_4_of_12 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="input-primary" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col span_4_of_12 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="input-primary" name="username" value="{{ old('username') }}" required>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col span_4_of_12 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="input-primary" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col span_4_of_12 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="input-primary" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn button-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
