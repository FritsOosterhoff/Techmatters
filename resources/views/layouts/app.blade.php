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

  <title>Dive</title>
  <meta name="description" content="Dive - A simple social networking solution">
  <meta name="keywords" content="social, network, laravel, product">

  <meta name="author" content="www.github.com/FritsOosterhoff">

  <meta http-equiv="cleartype" content="on">

  <link rel="shortcut icon" href="{{url( '/favicon.ico')}}">
  <meta name="csrf-token" content="{{ Session::token() }}">
  <!-- Responsive and mobile friendly stuff -->
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="480">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{route('home')}}/css/html5reset.css" media="all">


  <link rel="stylesheet" href="{{route('home')}}/css/col.css" media="all">

  <style type="text/css">

  </style>

</head>

<body>

  <div class="navbar ">
    <div class="main-content main-container">
      <div class="section group">
        <!-- LOGO SECTION -->
        <div id="branding-nav" class="col span_7_of_12">

          <div class="col span_3_of_12 logo-container">
            <div class="logo"><a href="{{route('home')}}"><img src="{{url('/img/dive_logo.png')}}" /></a></div>
          </div>

          <div class="col span_8_of_12 fl-left menu-container">
            <nav class="first-menu">
              <ul>
                <li><a href="{{url('/newest')}}"> Newest </a></li>
                <li><a href="{{url('/trending')}}">Trending</a></li>
                @if(Auth::check())
                <li><a href="{{url('/following')}}">Following</a></li>
                @endif

                <!-- <li><a href="{{url('/teams')}}"> Teams</a></li> -->
              </ul>
            </nav>
          </div>
        </div>


        <div id="nav_tools" class="col span_5_of_12" >
          <div class="col span_7_of_12 ">
            <input type="search" name="search" placeholder="Search" onkeypress="handle(event, this)" class="searchbar" />
          </div>
          <div class="col span_5_of_12 fl-right">
            <ul class="socials">

              @if (Auth::check())
              <li><a href="{{url('profile')}}"><img class="user_avatar_small" style="margin-top:5px;" src="{{url('/img/uploads/avatars/'  . Auth::user()->avatar)}}"></img></a></li>
              <li><a id="add_post" onclick="close_post_panel()"><i class="fa fa-fw fa-lg fa-plus "></i></a></li>
              <li class="soc"><a href="#"><i class="fa fa-fw fa-lg fa-globe "><i class="badge"></i></i></a></li>
              <!-- <li class="soc"><i class="fa fa-fw fa-lg fa-inbox"><i class="badge"></i></i></li> -->
              <li  class="fl-right"><a href="{{ route('logout') }}">Sign out</a></i></li>
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


</div>
<div class="page-start main-content main-container">


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



function getCount(obj) {
  return (($(obj).text().length > 0) ? parseInt($(obj).text()) : 0);
}

function likePost(id) {
  span = $(".box #" + id + " span");
  icon = $(".box #" + id + " .fa");
  like_count = getCount($(".box #" + id + " span"));


  if (!icon.hasClass('fa-heart')) {
    url = '{{url("like")}}';
    $(span).text(like_count + 1);
  } else {
    url = '{{url("removelike")}}';
    $(span).text(span_c > 1 ? (like_count - 1) : '');
  }

  $.ajax({
    type: "POST",
    url: url,
    data: {
      'likeable': id
    }
  },
  // success:
);
icon.toggleClass('fa-heart-o fa-heart');

}

function removePost(id) {
  $.ajax({
    type: "POST",
    url:   url = '{{url("removepost")}}',
    data: {
      'post_id': id
    },

    success: function(){
      window.location = '{{url('/')}}';
    },
  });

}

function followUser(id) {

  $.ajax({
    type: "POST",
    url: '{{url("followuser")}}',
    data: {
      'followable_id': id
    },
    success: function(){
      location.reload();
    },
  });

}

function unfollowUser(id) {
  $.ajax({
    type: "POST",
    url:   url = '{{url("unfollowuser")}}',
    data: {
      'followable_id': id
    },
    success: function(){
      location.reload();
    },
  });

}

function sendCommentToPost(id) {
  $.ajax({
    type: "POST",
    url: "{{url('/comment')}}",
    data: {
      'text': 'THIS IS MY TEXT',
      'commentable_id': id
    }
  },
  // success: success
);
}
jQuery(function($) {
  $('.box').matchHeight();
});


function close_post_panel() {

  $("#add_post_panel").toggle();
}

function handle(e, obj) {

  if (e.keyCode === 13) {
    //$("searchBox")
    var q = $(obj).val();

    window.location.href = "{{url('/')}}" + "/search/" + q;


  }
  return false;
}

$('.item').click(function(event){
  console.log(event.target.className);
  if(event.target.className.indexOf("fa")<0){
    parent = event.target.closest('.item');
    // console.log(parent.id);
    window.location.href = "{{url('/')}}" + "/post/" + parent.id;
    // console.log(parent);
  }
});


</script>


</body>

</html>
