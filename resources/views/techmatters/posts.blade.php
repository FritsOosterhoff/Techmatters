

@extends('techmatters.app')

@section('title', $title)


@section('content')



@if(!empty($posts))


<section class="recent-activity py-5">

	<div class="container">
		<h2 class="text-center ">{{$title}}</h2>
		<div class="row">

			<div class="col-md-8">

				<div class="pt-3">
					<form class="form-horizontal" method="POST" action="{{url('/new_post')}}" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
							<textarea class="form-control" rows="5" name="text" placeholder="What are you thinking?"></textarea>
						</div>


						<div class="form-group">
							<img id="image-upload" class="img-fluid" src="{{url('/img/photo-camera.png')}}"> <input type="file" style="display:none" id="file-upload" name="file" onchange="loadFile(event)">
							<button type="submit" class="btn btn-primary pull-right">
								Post
							</button>
						</div>
					</form>
				</div>

				@each('techmatters.post_each', $posts, 'post')
				<!-- col-md-8 -->
			</div>

			<div class="col-md-4">

				<div class="card mt-5">
					<div class="card-header">
						Recent Photos
					</div>

					<div class="card-body">
						<div class="row">
							@foreach($media as $image)
							<div class="col-4 py-3">
								<a href="{{url('post/' . $image->id)}}">
									<img src="{{ (strpos($image->image, 'http')===false) ? url('public/img/uploads/images/' . $image->image) : $image->image}}" class="img-fluid"> </a>
								</div>

								@endforeach
							</div>
						</div>
					</div>
					<!-- col-md-4 -->
				</div>

				<!-- row -->
			</div>

			<!-- container -->
		</div>

	</section>


	<!-- -->


	@endif
	@endsection
