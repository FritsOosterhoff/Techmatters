@extends('layouts.app')

@section('content')

	@if(!empty($user))

	<div class="section group">

	        <div class="col span_12_of_12 panel bg-white">


	            <img src="{{url('/img/uploads/avatars/' . $user->avatar)}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">

							<h1>{{ $user->username }}</h1>
						@if(Auth::id()===$user->id)
	            <form enctype="multipart/form-data" action="{{url('profile')}}" method="POST">
	                <label>Update Profile Image</label>
	                <input type="file" name="avatar">
	                <input type="hidden" name="_token" value="{{ csrf_token() }}">
	                <input type="submit" class="pull-right btn btn-sm btn-primary">
	            </form>
							@endif
	        </div>



	</div>

	<div class="section group">
		@each('layouts.post', $user->posts, 'post')
	</div>

	@endif


@endsection
