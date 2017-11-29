  @extends('layouts.app')

@section('title', 'Sign in')

  @section('content')

</div></div>
  <div id="login_panel" style="background:#1b212c;"  class="section group">

    <div class=" span_12_of_12 center" style="width:50%; margin:0px auto; padding: 40px 0px 120px 0px;">
      <div class="section group">
        <div class="col span_6_of_12"><div class="fl-left" style="margin-right:20px;"><a id="login_close" style="cursor:pointer"><i class="fa fa-2x fa-close color-white"></i></a></div><div class="fl-left"><h2 class="color-white" style="text-align:center">Sign in</h2></div></div>
        <div class="col span_1_of_12 fl-right"></div>
      </div>
      <form class="form-horizontal" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="section group">
          <!-- <div class="section group"> -->
          <div class="col span_6_of_12">
            <!-- <input type="email" class="input-primary" placeholder="Email"/> -->
            <input id="email" type="email" class="input-primary" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
          </div>

          <div class="col span_6_of_12">
            <!--            <input type="password" class="input-primary"  placeholder="Password"/> -->
            <input id="password" type="password" class="input-primary" name="password" placeholder="Password" required>

          </div>
        </div>
        <!-- </div> -->

        <div class="col span_12_of_12">
          <button type="submit" class="btn button-primary">
            Login
          </button>


                    <a class="btn btn-link color-white " href="{{ route('register') }}">
                      Register
                    </a>
          <a class="btn btn-link color-white fl-right" href="{{ route('password.request') }}">
            Forgot Your Password?
          </a>

        </div>
      </div>
    </form>

  </div>

  @endsection
