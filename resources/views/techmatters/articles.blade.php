

@extends('techmatters.app')

@section('title', $title)


@section('content')



@if(!empty($articles))

    <section class="articles py-5">
      <div class="row">


        <div class="col-md-8 pt-5">

          <h2>Latest news</h2>
          <div class="articles-content mt-2">
            @each('techmatters.article_each', $articles, 'article')
          </div>
        </div>


        <div class="col-md-4 pt-5">
          <h2>Interesting articles</h2>
          <div class="recent-articles">


            @each('techmatters.article_simple',  $interesting_articles, 'article')


            </div>
          </div>

        </div>

        </section>

	@endif
	@endsection
