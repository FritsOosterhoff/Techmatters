@extends('layouts.app')

@section('content')


@if(!empty($posts))


<div class="section group">
	<h1>Posts</h1>
	@each('layouts.post', $posts->all(), 'post')
</div>


@endif

@endsection
