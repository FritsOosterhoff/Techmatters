
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
<div class="container">

	<div class="profile card-profile text-center">
		<div  class="card-img-top" style="background-image: url(&quot;{{url('img/uploads/banners/' . $user->banner)}}&quot;);"> </div>
		<div class="card-block">
			<img alt="" class="card-img-profile" src="{{url('img/uploads/avatars/' . $user->avatar)}}">
			<h4 class="card-title">
				{{$user->username}} <br>
				<br>
				<small>{{$user->biography}}</small>
			</h4>
			<div class="card-links">


				<ul class="nav justify-content-center">
					<li class="nav-item">
						<a class="nav-link" href="#">{{count($user->posts)}} Posts</a>
					</li>
					<li class="nav-item">
						<a class="nav-link " href="#">{{$user->follower_count()[0]->followers}} Followers</a>
					</li>
					<li class="nav-item">
						<a class="nav-link " href="#">{{count($user->follows)}} Follows</a>
					</li>

					<li class="nav-item">
						<a class="nav-link disabled" href="#">Disabled</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="py-5 bg-light text-dark">

	<div class="container">
		<h1 class="display-5">{{$title}}</h1>

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



<!--


<div style="
background-image: url(&quot;http://social.fritsoosterhoff.nl/img/banner.jpg&quot;);
background-size: cover;
background-repeat: no-repeat;
background-position: 50% 50%;height:60vh;position:absolute;z-index:-1;width:100%;
">


<div class="mx-auto" style=" width:300px; padding-top:85%;">
<div class="social" style="background:none;position:absolute;top:85%; width:300px">

<div class="user_image mx-auto" style="width:300px;">
<img class="mx-auto rounded-circle bg-white" style="padding:5px;" src="https://randomuser.me/api/portraits/women/31.jpg" />
<h1 class="display-3 mb-4">Foo.social</h1>
</div>


</div>
</div>
</div>

<div class="container" style="padding-top:80vh">

<div class="col-md-12 bg-white">

<ul class="nav justify-content-center">
<li class="nav-item">
<a class="nav-link active" href="#">Active</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">Link</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">Link</a>
</li>
<li class="nav-item">
<a class="nav-link disabled" href="#">Disabled</a>
</li>
</ul>
</div>

</div>
</div>

<div style="height:4000px;"></div>

<!--
<div class="py-5 bg-light text-dark text-center" class=" py-5" style="
background-image: url(&quot;http://social.fritsoosterhoff.nl/img/banner.jpg&quot;);
background-size: cover;
background-repeat: no-repeat;
background-position: 50% 50%;height:50vh;
">


<div class="container mx-auto" style="background:none;position:relative;">
<div class="row mx-auto" style="position:absolute;top:85%;">
<div class="col-md-6">
<div class="user_image mx-auto" style="width:300px;">
<img class="mx-auto rounded-circle bg-white" style="padding:5px;" src="https://randomuser.me/api/portraits/women/31.jpg" />
<h1 class="display-3 mb-4">Foo.social</h1>
</div></div>

</div>
</div>


<!--
<ul class="nav justify-content-center">
<li class="nav-item">
<a class="nav-link active" href="#">Active</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">Link</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">Link</a>
</li>
<li class="nav-item">
<a class="nav-link disabled" href="#">Disabled</a>
</li>
</ul>
</div>
</div>
-->

@endsection
