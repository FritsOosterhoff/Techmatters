
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
<div class="container-fluid">

	<div class="profile card-profile text-center">
		<div  class="card-img-top" style="background-image: url(&quot;{{url('img/uploads/banners/' . $user->banner)}}&quot;);"> </div>
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

					<a class="btn btn-secondary "  id="{{$user->id}}" onclick="followUser(this.id)"  style=" border-radius:100%; height:40px;width:40px; margin-right:10px; color:white" ><i class="fa fa-user-plus"></i></a>



					@endif

				</ul>
	</div>
</div>
</div>
</div>

<div class="py-5 bg-light text-dark">

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



@endsection
