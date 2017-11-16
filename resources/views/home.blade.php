@extends('layouts.app')

@section('content')


@if(!empty($posts))

@foreach (array_chunk($posts->all(), 5) as $post_sections)

<div class="section group">
	@foreach($post_sections as $post)
	<div class="col span_1_of_5">
		<div class="box" >


			<div class="box-img"><img src="{{'img/uploads/' . $post->image}}" /></div>
			<div class="box-content">
				<p><a class="user" href="#">@ImAtWar</a></p>
				<p style="font-size:10px">{{$post->updated_at}}</p>
				{{$post->text}}<br /></div>
				<div class="social_interactions"><i class="fa fa-fw fa-lg fa-heart "></i>15</div>
			</div>
		</div>
		@endforeach
	</div>
	@endforeach




	@endif

	@endsection
