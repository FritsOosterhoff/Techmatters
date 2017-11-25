@extends('layouts.app')

@section('content')


@if(!empty($posts))


<div class="section group">
	<h1 class="page-heading">{{$title}}</h1>
	@foreach($posts as $post)


	<div class="col span_3_of_12 item" id="{{$post->id}}">
	  <div class="box" >

			<div class="user_profile">
			  <a href="{{url('profile/' . $post->username)}}">
			  <div class="col span_12_of_12">
			    <!-- -->
			    <img src="{{ url('/img/uploads/avatars/' . $post->avatar)}}" class="user_avatar">
			    <div class="user_card" style="">

			      <h4>{{$post->username}}</h4>
			      <span>{{$post->updated_at}}</span></div>


			  </div>

			</a>

			</div>

	    <div class="box-img">

	      <img src="{{ (strpos($post->image, 'http')===false) ? url('/img/uploads/' . $post->image) : $post->image}}" />
	    </div>
	    <div class="box-content">


	      {!! $post->text = preg_replace('/(?:^|\s)#(\w+)/',' <a href="'. url("tag/$1") . '">#$1</a>', preg_replace('/@(\w+)/', '<a href="'. url("profile/$1") . '">@$1</a>', $post->text)) !!}


	      <br /></div>

	      <div class="social_interactions">
	        <ul>


						<li class="post like_icon"  id="{{$post->id}}" onclick="likePost({{$post->id}})"><i class="fa fa-fw  fa-heart "></i><span>{{$post->likes}}</span></li>

	          @if($post->user_id === Auth::id()) <!-- || Auth::id()===201 -->
	          <li class="remove_icon fl-right" onclick="removePost({{$post->id}})"><i class="fa fa-fw  fa-trash-o "></i></li>
	          @endif

	      </ul></div>
	    </div>
	  </div>


	@endforeach


</div>

<div class="section group">
	<div id="paginate-container" class="center">
		{{$posts->links()}}
	</div>
</div>

@endif

@endsection
