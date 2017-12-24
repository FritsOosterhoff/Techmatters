<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <!-- <link rel="stylesheet" href="style.css" type="text/css"> -->
  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{route('home')}}/css/style.css" media="all">
  <meta name="description" content="Foo.social - A simple social networking solution">
  <title>Foo.social - @yield('title', 'Newest')</title>
  <meta name="keywords" content="social, network, laravel, product"> </head>


<body>
  <nav class="navbar navbar-expand-md bg-secondary navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand mf-auto" href="{{route('home')}}">
        <img src="{{url('/img/dive_logo.png')}}"  class="img-fluid"> </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mx-auto ">
          <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('newest')}}">Newest</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('trending')}}">Trending</a>
          </li>
          @if (Auth::check())

          <li class="nav-item">
            <a class="nav-link" href="{{url('following')}}">Following</a>
          </li>
          @endif

        </ul>

        <ul class="nav navbar-nav ml-auto">
          <!--
          <li class="nav-item align-fix">
            <input class="form-control mr-2"  onkeypress="searchHandle(event, this)" type="text" placeholder="Search" style="border-radius:50px;padding:3px 8px">
          </li>
          -->

          @if (Auth::check())
              <li class="nav-item align-fix">
                <a href="{{url('profile')}}">
                  <img class="rounded-circle" style="width:32px; height:32px;" src="{{url('/img/uploads/avatars/'  . Auth::user()->avatar)}}">
                </a>
              </li>
              <!--
              <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-fw fa-globe"></i></a></li>
              <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-fw fa-envelope"></i></a></li>
            -->
              <li class="nav-item">
                <a class="nav-link" href="{{url('logout')}}">Sign out</a>
              </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{url('login')}}">Sign in</a>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

  @yield('content')






  <div class="py-5 bg-dark text-white">
    <div class="container">
      <div class="row">
        <!--

        <div class="col-md-9">
          <p class="lead">Sign up to our newsletter for the latest news</p>
          <form class="form-inline">
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Your e-mail here"> </div>
            <button type="submit" class="btn btn-primary ml-3">Subscribe</button>
          </form>
        </div>

      <div class="col-4 col-md-1 align-self-center">
        <a href="https://www.facebook.com" target="_blank"><i class="fa fa-fw fa-facebook fa-fw text-white"></i></a>
      </div>
      <div class="col-4 col-md-1 align-self-center">
        <a href="https://twitter.com" target="_blank"><i class="fa fa-fw fa-twitter fa-fw text-white"></i></a>
      </div>
      <div class="col-4 col-md-1 align-self-center">
        <a href="https://www.instagram.com" target="_blank"><i class="fa fa-fw fa-instagram text-white fa-1x"></i></a>
      </div>

      -->
      </div>
      <div class="row">
        <div class="col-md-12 mt-3 text-center">
          <p>© Copyright {{date('Y')}} Foo.socials - A project by Frits Oosterhoff</p>
        </div>
      </div>
    </div>
  </div>



  <script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script> -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js'></script>
<script src='https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js'></script>
<script src='https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js'></script>

<script src="{{route('home')}}/js/index.js"></script>

  @stack('scripts')

  <script>

  function searchHandle(e, obj) {

    if (e.keyCode === 13) {
      //$("searchBox")
      var q = $(obj).val();

      window.location.href = "{{url('/')}}" + "/search/" + q;


    }
    return false;
  }


    window.onload = function(){
      if(document.getElementById("image-upload")){
        document.getElementById("image-upload").addEventListener("click", function(){
          document.getElementById("file-upload").click();
        });
      }
    }


    var loadFile = function(event) {
      var output = document.getElementById("image-upload");
      console.log(output);
      console.log(event.target.files[0]);

      //event.target.files[0].name
      output.src = URL.createObjectURL(event.target.files[0]);
    };

    function getCount(obj) {
      return (($(obj).text().length > 0) ? parseInt($(obj).text()) : 0);
    }

    function likePost(id) {
      span = $(".card #" + id + " span");
      icon = $(".card #" + id + " .fa");
      like_count = getCount($(".card #" + id + " span"));
      console.log(span);
      console.log(icon);
      console.log(like_count);

      if (!icon.hasClass('fa-heart')) {
        url = '{{url("like")}}';
        $(span).text(like_count + 1);
      } else {
        url = '{{url("removelike")}}';
        $(span).text(like_count > 1 ? (like_count - 1) : '');
      }

      console.log(url);
      console.log(id);
      $.ajax({
        type: "POST",
        url: url,
        data: {
          'likeable': id
        }
      });
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
      console.log(id);
      $.ajax({
        type: "POST",
        url: "{{url('/comment')}}",
        data: {
          'text': 'THIS IS MY TEXT',
          'commentable_id': id
        }
      });
    }

    $(document).ready(function(){
        console.log($('body'));
    });




  </script>

</body>

</html>
