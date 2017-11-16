<!DOCTYPE html>
<!-- HTML5 Boilerplate -->
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>

  <meta charset="utf-8">
  <!-- Always force latest IE rendering engine & Chrome Frame -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Example of the Responsive Grid System</title>
  <meta name="description" content="This is the Responsive Grid System, a quick, easy and flexible way to create a responsive web site.">
  <meta name="keywords" content="responsive, grid, system, web design">

  <meta name="author" content="www.grahamrobertsonmiller.co.uk">

  <meta http-equiv="cleartype" content="on">

  <link rel="shortcut icon" href="/favicon.ico">

  <!-- Responsive and mobile friendly stuff -->
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{route('home')}}/css/html5reset.css" media="all">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="all">

  <link rel="stylesheet" href="{{route('home')}}/css/col.css" media="all">
  <link rel="stylesheet" href="{{route('home')}}/css/4cols.css" media="all">
  <link rel="stylesheet" href="{{route('home')}}/css/3cols.css" media="all">
  <link rel="stylesheet" href="{{route('home')}}/css/8cols.css" media="all">
  <link rel="stylesheet" href="{{route('home')}}/css/5cols.css" media="all">

  <style type="text/css">
  @import url('https://fonts.googleapis.com/css?family=Montserrat:400,500,600');
  body {
    margin: 0;
    padding: 0;
    font-family: 'Montserrat', sans-serif;
    font-size: 13px;
    color: #000;
    /*background: #fefefe;*/
    height:1500px;
    background:#ccc;
  }
  .normal_font{font-family:verdana;}
  .navbar {
    overflow: hidden;
    background: #222835;
  }

  .navbar .logo {
    margin-left: 20px;
  }
  .navbar .logo img{max-width:80px;width:100%; }

  .main-container {
    width: 80%;
    margin: 0px auto;
    padding: 0;
  }

  .fl-right {
    float: right;
  }

  .fl-left {
    float: left;
  }

  .navbar .first-menu {
    list-style: none;
  }

  .navbar .first-menu li a{
    display:block;
    float: left;
    margin-right: 20px;
    color:white;
    line-height: 40px;
  }

  a{
    color:#000;
    text-decoration:none;
  }
  a:hover{text-decoration:underline}
.darkblue{background:#1b212c;color:white;}

  .socials {

    list-style: none;
  }
  .socials .fa{
    font-size:1.6em;
  }

  .socials li a{float:left; color: #fff;  line-height: 40px; cursor:pointer;}
  .socials li.soc i.fa {position:relative; width:auto}


    .badge{
      position: absolute;
      background: #29abe2;
      height:10px;width:10px;
      right:-5px;  top:-5px;
      border-radius: 50%;
    }

  .container {
    width: 100%;
  }
  h1{font-size:40px;}
  h2{font-size:26px;}
  h3{font-size:24px;}
  h4{font-size:22px;}

  input{font-family: Montserrat}
  .color-white{color:white;}
  .color-primary{color:#ccc};

  h1,
  h2,
  h3,
  h4,
  h5, input[type="input"] {
    font-family: 'Montserrat', sans-serif;
    padding:10px 0px;
  }

  .searchbar {
    background: #fff;
    width: 100%;
    height: 30px;
    border-radius: 40px;
    border: none;
    text-indent: 20px;
    outline: none;margin-top:5px;
  }

  .box {
    background: white;

  }

  input[type=text]::-ms-clear {  display: none; width : 0; height: 0; }
  input[type=text]::-ms-reveal {  display: none; width : 0; height: 0; }
  input[type="search"]::-webkit-search-decoration,
  input[type="search"]::-webkit-search-cancel-button,
  input[type="search"]::-webkit-search-results-button,
  input[type="search"]::-webkit-search-results-decoration { display: none; }

  .box{position:relative; margin-bottom:20px;}
  /**.box-img{margin-bottom:20px;}**/
  .box-img img{max-height:200px;max-width:100%; }
  .box-content{padding:5px;}
  .box.no-style{
    background:none!important;
    -webkit-border-radius: 0px;
    border-radius: 0px;
    -webkit-box-shadow: none;
    box-shadow: none;
  }
  .box.no-style img{height:100%;width:100%;}
  .box.no-style .box-img{margin-bottom:0px}

  .user{color:black;}
  .user:hover{text-decoration:none}
  .box:hover .social_interactions{display:block;}
  .social_interactions{float:right;margin-right:15px;position:absolute; top:5px; left:5px;display:none; color:white;font-weight:bold;
    -webkit-transition: all 300ms ease-in-out;
    -moz-transition: all 300ms ease-in-out;
    -ms-transition: all 300ms ease-in-out;
    -o-transition: all 300ms ease-in-out;
    transition: all 300ms ease-in-out;}


    .panel{

    }

    /*#login_panel{
      display:none;
    }*/



    @media only screen and (max-width: 480px) {
      .navbar .first-menu ul li a{
        width:100%;
        border-bottom:1px solid #ccc;
        float:none;display:block
      }
      .main-container{width:95%;}
      .logo{
        margin: 0px auto;
        padding: 0;
        width: 77px;
        margin-top: 10px;
        margin-left:0px!important;
      }
    }

    @media only screen and (max-width: 900px){
      #second{width:100%;}
      .logo-container{width:100%;}
      .menu-container{width:100%;}
      #branding-nav{width:100%;}
    }

    @media only screen and (max-width: 1000px) {
      .span_1_of_5{width: 32.26%;}
    }


    @media only screen and (max-width: 480px) {
      .span_1_of_5{width: 100%;}
    }


    </style>

  </head>

  <body>

    <div class="navbar ">
      <div class="main-container">
        <div class="section group">
          <!-- LOGO SECTION -->
          <div id="branding-nav" class="col span_7_of_12">

            <div class="col span_3_of_12 logo-container">
              <div class="logo"><a href="{{route('home')}}"><img src="img/dive_logo.png" /></a></div>
            </div>

            <div class="col span_8_of_12 fl-left menu-container">
              <nav class="first-menu">
                <ul>
                  <li><a href=""> News </a></li>
                  <li><a href="connect"> Connect </a></li>
                  <li><a href="teams"> Teams</a></li>
                  <li><a href="community"> Community </a></li>
                </ul>
              </nav>
            </div>
          </div>


          <div class="col span_5_of_12" id="second">
            <div class="col span_7_of_12 ">
              <input type="search" name="search" placeholder="Search" onkeypress="handle(event, this)" class="searchbar" />
            </div>
            <div class="col span_5_of_12 fl-right">
              <ul class="socials">
                @if (Auth::check())
                <li><a id="add_post"><i class="fa fa-fw fa-lg fa-plus "></i></a></li>
                 <li class="soc"><a href="#"><i class="fa fa-fw fa-lg fa-globe "><i class="badge"></i></i></a></li>
                <!-- <li class="soc"><i class="fa fa-fw fa-lg fa-inbox"><i class="badge"></i></i></li> -->
                <li  class="fl-right"><a href="{{ route('logout') }}">Sign out</a>
                  @else
                  <li><a style="cursor:pointer" id="login_button" href="{{route('login')}}"class="color-white">Sign in</a> </li>
                    @endif

                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

              @include('posts.create_post')


      <!--
      <div id="login_panel" style="background:#1b212c; "  class="section group">
        <div class=" span_12_of_12 center" style="width:50%; height:auto; margin:0px auto; padding: 40px 0px 120px 0px;">
          <div class="section group">
            <div class="col span_6_of_12"><div class="fl-left" style="margin-right:20px;"><a id="login_close" style="cursor:pointer"><i class="fa fa-2x fa-close color-white"></i></a></div><div class="fl-left"><h2 class="color-white" style="text-align:center">Sign in</h2></div></div>
            <div class="col span_1_of_12 fl-right"></div>
          </div>
          <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <!-- <div class="section group">
            <div class="col span_5_of_12">
              <!-- <input type="email" class="input-primary" placeholder="Email"/>
              <input id="email" type="email" class="input-primary" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="col span_5_of_12">
              <!--            <input type="password" class="input-primary"  placeholder="Password"/>
              <input id="password" type="password" class="input-primary" name="password" placeholder="Password" required>

            </div>
            <!-- </div>

            <div class="col span_12_of_12">
              <button type="submit" class="btn button-primary">
                Login
              </button>

              <a class="btn btn-link color-white" href="{{ route('password.request') }}">
                Forgot Your Password?
              </a>
            </div>
          </div>
        </form>

      </div>
    -->
      </div>
      <div class="main-content main-container">


        @yield('content')



      </div>


      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="http://brm.io/js/libs/matchHeight/jquery.matchHeight.js"></script>
      <script src="https://unpkg.com/vue@2.1.6/dist/vue.js"></script>
      <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

@stack('scripts')

      <script>

      /*
      new Vue({

      el : '#users',
      data: {
      users: []
    },
    mounted(){
    // ajax

    axios.get('https://jsonplaceholder.typicode.com/users')
    .then(response => this.users = response.data);

  },

  beforeDestroy(){

}
});
*/

// if ( document.URL.contains("homepage.aspx") ) {}
//
// var login_page = false;
//
//   if(window.location.href.indexOf("login")> -1){
//     login_page = true;
//   }

// if(login_page)
// $("#login_panel").show();



jQuery(function($){
  $('.box').matchHeight();
});
//
// $("#login_button").click(function() {
//   console.log('click');
//   if(window.location.href.indexOf("login")=== -1){
//     $("#login_panel").toggle();
//   }
// });
//
// $("#login_close").click(function() {
//   if(window.location.href.indexOf("login") > -1){
//     $("#login_panel").toggle();  }
//   });

$("#add_post").click(function(){
  $("#add_post_panel").show();
});

  $("#add_post_close").click(function(){
    $("#add_post_panel").hide();
  });

  function handle(e, obj){

    if(e.keyCode === 13){
      //$("searchBox")
      var q = $(obj).val();
      console.log(q);

    }
    return false;
  }

</script>


</body>

</html>
