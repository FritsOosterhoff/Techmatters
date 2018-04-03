
@extends('techmatters.app')

@section('title', $title)


@section('content')



@if(!empty($posts))


<section class="recent-activity py-5">

	<div class="container">
		<h2 class="text-center mb-2 ">{{$title}}</h2>
		<div class="row">

			<div class="col-md-8">



          <div class="card">

            <div class="user p-2">
              <img class="avatar rounded-circle" src="https://social.fritsoosterhoff.nl/img/uploads/avatars/10.jpg" />
              <div class="details">
                <b> Andres fushigi </b>
                <p class="small"><span>ajsdhajushd</span></p>
              </div>
            </div>

            <div class="card-body">
              <!-- <h5 class="card-title">Card title that wraps to a new line</h5> -->
              <p class="card-text">It FINALLY happened! Now i have a more serious looking design for social and techmatters</p>

            </div>

            <div class="images ">
		            <img src="https://social.fritsoosterhoff.nl/img/uploads/images/12.jpg" class="img-fluid">
		            <img src="https://social.fritsoosterhoff.nl/img/uploads/images/23.jpg" class="img-fluid post-image col-4">
		            <img src="https://social.fritsoosterhoff.nl/img/uploads/images/6.jpg" class="img-fluid post-image col-4">
		            <img src="https://social.fritsoosterhoff.nl/img/uploads/images/4.jpg" class="img-fluid post-image col-4" >
            </div>




            <div class="card-footer">
              <ul class="social_tools" style=" float: right;  padding:0px; margin:0px;">
                <li class="like_icon" id="3" onclick="likePost(3)"><i class="fa fa-fw fa-heart-o "></i> <span></span></li>
              </ul>
            </div>
          </div>
					<!-- main column left -->
        </div>



						<div class="col-md-4 sidebar">

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
						</div>


		</div>



	</div>

	@endif
@endsection

<script>
</script>
