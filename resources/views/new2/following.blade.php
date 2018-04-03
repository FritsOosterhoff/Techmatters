
@extends('new.app')

@section('title', $title)


@section('content')


@if(!empty($posts))

<div class="py-5 bg-light text-dark">

	<div class="container">
		<h1 class="display-5">{{$title}}</h1>

		@foreach (array_chunk($posts->all(), 3) as $post)
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
			 		{{$posts->links('new.pagination')}}
			</div>
		</div>
	</div>
</div>

@endif

@endsection
