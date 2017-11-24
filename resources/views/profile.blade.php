@extends('layouts.app')

@section('content')

@if(!empty($user))

</div></div>
<div class="banner">
	<img src="{{url('/img/uploads/banners/' . $user->banner)}}" />
</div>
<div class="bg-primary profile-page">
	<div class="main-content main-container">
		<div class="section group profile">

		<div class="center panel user_info span_6_of_12">

			<div class="user_profile center">
				<div class="user_img center"><img src="{{url('/img/uploads/avatars/' . $user->avatar)}}" /></div>
				<div class="user_info">
					<h1>{{ $user->username }}</h1>
					<p>{{$user->biography}}</p>
					<p>{{$user->follows()->count()}} Follows</p>


					@if(Auth::user()->follow_person($user->id))
					<p>You follow {{$user->name}} </p>
					@else <p>You dont follow {{$user->name}}</p>
					@endif
				</div>
		</div>

		@if(Auth::id()===$user->id)
		<form enctype="multipart/form-data" action="{{url('profile')}}" method="POST">
		<label>Update Profile Image</label>
		<input type="file" name="avatar">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="submit" class="pull-right btn btn-sm btn-primary">
		</form>
		@else
		<a href="{{url('follow')}}">  </a>
		@endif
	</div>

		<div class="section group">
			<h1 class="page-heading">Articles</h1>
			@each('layouts.post', $user->posts, 'post')
		</div>

	</div>
</div>

@endif


@endsection
