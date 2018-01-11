
@extends('new.app')

@section('title', $title)


@section('content')

<style>

.card-profile {

	margin: 0px auto;
	margin-bottom: 50px;
	background-color: #eff1f5;
	border-radius: 0;
	border: 0;

}
.card-img-top {
	border-radius: 0;
	width:auto;
	background-repeat:no-repeat;
	background-position:center center; width:100%; height:60vh;
}

.card-img-profile {
	max-width: 100%;
	border-radius: 50%;
	margin-top: -95px;
	margin-bottom: 35px;
	border: 5px solid #e6e5e1;

	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}

.card-title {
	margin-bottom: 50px;

}


.card-img-profile{
	max-height:140px;
	max-width:140px;
}

</style>
<link rel="stylesheet" href="{{route('home')}}/css/main.css" media="all">
<link rel="stylesheet" href="{{route('home')}}/css/cropper.min.css" media="all">
<div class="container-fluid" style="padding:0px;">

	<div class="profile card-profile text-center">
		<div  class="card-img-top" style="background-image: url(&quot;{{url('public/img/uploads/banners/' . $user->banner)}}&quot;);"> </div>
		<div class="card-block">
			<div class="image-block">
			<img alt="{{$user->username}}_avatar" id="form_image" class="card-img-profile" src="{{url('img/uploads/avatars/' . $user->avatar)}}" style="position:relative">
			<i style="position:absolute;top:0;" class="fa fa-pencil"></i>
		</div>
			<h4 class="card-title">
				{{$user->username}} <br>
				<br>
				<small>{{$user->biography}}</small>
			</h4>

			<div class="card-links pb-5">


				<ul class="nav justify-content-center mb-3">
					<li class="nav-item">
						<a class="nav-link" href="#">{{count($user->posts)}} Posts</a>
					</li>
					<li class="nav-item">
						<a class="nav-link " href="#">{{$user->follower_count()[0]->followers}} Followers</a>
					</li>
					<li class="nav-item">
						<a class="nav-link " href="#">{{count($user->follows)}} Follows</a>
					</li>
				</ul>

				

				<ul class="nav justify-content-center">

					@if(Auth::id()!==$user->id)
						@if(Auth::user()->follow_person($user->id))
							<a class=" btn-danger " id="{{$user->id}}" onclick="unfollowUser(this.id)"  style=" border-radius:100%; height:40px;width:40px; line-height:40px;margin-right:10px; color:white;border:0;"><i class="fa fa-user-times"></i></a>
						@else
							<a class=" btn-success "  id="{{$user->id}}" onclick="followUser(this.id)"  style=" border-radius:100%; height:40px;width:40px; line-height:40px;margin-right:10px; color:white;border:0;" ><i class="fa fa-user-plus"></i></a>
						@endif

					<a class="btn btn-secondary "  id="{{$user->id}}" onclick="followUser(this.id)"  style=" border-radius:100%; height:40px;width:40px; margin-right:10px; color:white" ><i class="fa fa-comment"></i></a>

					@else
					<!-- Button trigger modal -->
					<!-- Example single danger button -->
					<div class="btn-group">
					  <button type="button" class="btn btn-danger dropdown-toggle rounded" style=" " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-gears"></i>
					  </button>
					  <div class="dropdown-menu">
					    <a class="dropdown-item"  data-toggle="modal" data-target="#avatar-modal" href="#">Change profile image</a>
					    <a class="dropdown-item" href="#">Change Banner image</a>
					    <a class="dropdown-item" href="#">Something else here</a>
					    <div class="dropdown-divider"></div>
					    <a class="dropdown-item" href="#">Separated link</a>
					  </div>
					</div>


					<!-- Modal
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
-->
<div class="container" id="crop-avatar">
<div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form class="avatar-form" action="{{url('profile')}}"  enctype="multipart/form-data" method="post">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">×</button>
              <h4 class="modal-title" id="avatar-modal-label">Change Avatar</h4>
            </div>
            <div class="modal-body">
              <div class="avatar-body">

                <!-- Upload image and data -->
                <div class="avatar-upload">
                  <input type="hidden" class="avatar-src" name="avatar_src">
                  <input type="hidden" class="avatar-data" name="avatar_data">
                  <label for="avatarInput">Local upload</label>
                  <input type="file" class="avatar-input" id="avatarInput" name="avatar_file">
                </div>

                <!-- Crop and preview -->
                <div class="row">
                  <div class="col-md-9">
                    <div class="avatar-wrapper"></div>
                  </div>
                  <div class="col-md-3">
                    <div class="avatar-preview preview-lg"></div>
                    <div class="avatar-preview preview-md"></div>
                    <div class="avatar-preview preview-sm"></div>
                  </div>
                </div>

                <div class="row avatar-btns">
                  <div class="col-md-9">
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-90" title="Rotate -90 degrees">Rotate Left</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-15">-15deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-30">-30deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45">-45deg</button>
                    </div>
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="90" title="Rotate 90 degrees">Rotate Right</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="15">15deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="30">30deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="45">45deg</button>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <input type="submit" class="btn btn-primary btn-block ">Done</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->
          </form>
        </div>
      </div>
    </div>
	</div>




					@endif

				</ul>
	</div>
</div>
</div>



<div class="py-5 text-dark">

	<div class="container">
		<h1 class="text-center mb-5">{{$title}}</h1>




		@foreach (array_chunk($user->posts->all(), 3) as $post)
		<div class="row">
			@each('new.post', $post, 'post')
		</div>
		@endforeach
	</div>
</div>

<div class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			</div>
		</div>
	</div>
</div>
</div>

@push('scripts')

<script src="{{route('home')}}/js/cropper.min.js"></script>
<script src="{{route('home')}}/js/index.js"></script>
<script src="{{route('home')}}/js/main.js"></script>
<script>

</script>

@endpush


@endsection
