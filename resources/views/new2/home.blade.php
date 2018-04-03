
@extends('new.app')

@section('title', $title)


@section('content')


@if(!empty($posts))


<div class="py-5 text-dark">

	<div class="container">
		<h2 class="text-center mb-5">{{$title}}</h2>
		<!-- <div class="col-md-12"> -->



		@if(Auth::check())
		<?php $start = array_slice($posts->all(), 0, 2) ?>
		<?php $continues = array_slice($posts->all(), 2) ?>

		@foreach (array_chunk($start, 3) as $index => $post)
		<div class="row">
			 @if($index===0)
			 <div class="col-md-4 my-3 ">
				 <div class="card">
					 <div class="card-body">
						 <form class="form-horizontal" method="POST" action="{{url('/new_post')}}" enctype="multipart/form-data">
							 {{ csrf_field() }}
							 <div class="form-group">
								 <textarea class="form-control" rows="5" name="text" placeholder="What are you thinking?"></textarea>
							 </div>


							 <div class="form-group">
								 <img id="image-upload" class="img-fluid" src="{{url('/img/photo-camera.png')}}"> <input type="file" style="display:none" id="file-upload" name="file" onchange="loadFile(event)">
								 <button type="submit" class="btn button-primary pull-right">
									 Post
								 </button>
							 </div>
						 </form>
					 </div>
				 </div>
			 </div>
			 @endif

			 @each('new.post', $post, 'post')

		</div>
		@endforeach

		@foreach (array_chunk($continues, 3) as $post)
		<div class="row">
			@each('new.post', $post, 'post')
		</div>
		@endforeach

		@else

		@foreach (array_chunk($posts->all(), 3) as $post)
		<div class="row">
			@each('new.post', $post, 'post')
		</div>
		@endforeach

		@endif

	</div>
	<!-- </div> -->
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

<script>
</script>
