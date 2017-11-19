
  </div></div>

@if (Auth::check())

<div id="add_post_panel" class="darkblue section group">

      <div class="span_6_of_12 center form" >
        <div class="section group">
          <div class="col span_6_of_12"><div class="fl-left" style="margin-right:20px;"><a id="add_post"  onclick="close_post_panel()" style="cursor:pointer"><i class="fa fa-2x fa-close color-white"></i></a></div><div class="fl-left"><h2 class="color-white" style="text-align:center">Add a post</h2></div></div>
          <div class="col span_1_of_12 fl-right"></div>
        </div>
        <form class="form-horizontal" method="POST" action="new_post" enctype="multipart/form-data">
          {{ csrf_field() }}

          <!-- <div class="section group"> -->
          <div class="col span_5_of_12">
            <!-- <input type="email" class="input-primary" placeholder="Email"/> -->
            <input id="name" style="margin-top:30px;" type="name" class="input-primary" placeholder="Title" name="name" value="{{ old('name') }}" required autofocus>

          </div>

          <div class="col span_5_of_12">
            <!--            <input type="password" class="input-primary"  placeholder="Password"/> -->
            <!-- <input id="text" type="text" class="input-primary" name="file" placeholder="Password" required> -->
      <a ><img id="image-upload"
         src="{{route('home')}}/img/icons8-picture-96.png" /> <input type="file" style="visibility:hidden" id="file-upload" name="file" onchange="loadFile(event)"/></a>

          </div>

          <div class="section">    <textarea name="text" style="height:150px;" placeholder="Your new message" class="input-primary" value="{{old('text')}}"></textarea></div>
          <!-- </div> -->

          <div class="col span_12_of_12">
            <button type="submit" class="btn button-primary">
              Post
            </button>
<!--
            <a class="btn btn-link color-white" href="{{ route('password.request') }}">
              Forgot Your Password?
            </a> -->
          </div>
        </div>
      </form>

    </div>


</div>

@push('scripts')
<script>
$("#image-upload").click(function() {
  $("#file-upload").click();
});

var loadFile = function(event) {
  var output = document.getElementById("image-upload");
  console.log(output);
  console.log(event.target.files[0]);

  //event.target.files[0].name
  output.src = URL.createObjectURL(event.target.files[0]);
};

</script>

@endpush

@endif
