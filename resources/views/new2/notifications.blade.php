
@extends('new.app')

@section('title', $title)


@section('content')

<div class="py-5 text-dark">

		<h2 class="text-center mb-5">{{$title}}</h2>

@if(!empty($notifications))

	@foreach($notifications as $notification)

			<div class="col-md-8 mx-auto">
				<p class="text-center rounded" style="background:#eff1f5; padding:10px;">
					{{$notifation->type}}
				</p>
			</div>
	@endforeach

@else
<div class="col-md-8 mx-auto">
	<p class="text-center rounded" style="background:#eff1f5; padding:10px;">
		You have no notifications
	</p>
</div>
@endif
</div>

@endsection
