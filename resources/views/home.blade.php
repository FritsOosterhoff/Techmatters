@extends('layouts.app')

@section('content')


@if(!empty($posts))

@foreach (array_chunk($posts->all(), 4) as $post_sections)

<div class="section group">
	@foreach($post_sections as $post)
	<div class="col span_3_of_12">
		<div class="box" >
			@include('layouts.user', ['user' => $post->user])
			<div class="box-img">
			<!-- 'img/uploads/' . -->

				<img src="{{ (strpos($post->image, 'http')===false) ? url('/img/uploads/' . $post->image) : $post->image}}" />
			</div>
			<div class="box-content">

				{{$post->text}}<br /></div>

				<div class="social_interactions">
					<ul>
						<li class="like_icon"><i class="fa fa-fw fa-lg fa-heart-o "></i>15</li>
						<li class="comment_icon"><i class="fa fa-fw fa-lg fa-comment-o "></i>15</li>
						<li class="fl-right"><i class="fa fa-fw fa-lg fa-trash-o "></i></li>

				</ul></div>
			</div>
		</div>
		@endforeach
	</div>
	@endforeach




	@endif

	@endsection
