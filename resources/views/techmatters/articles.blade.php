

@extends('techmatters.app')

@section('title', $title)


@section('content')



@if(!empty($articles))

    <section class="articles py-5">
      <div class="row">


        <div class="col-md-8 pt-5">

          <h2>Latest news</h2>
          <div class="articles-content mt-2">
            <article class="row py-2">
              <div class="image-container col-4 col-md-4">
                <img class="img-fluid" src="https://social.fritsoosterhoff.nl/img/uploads/images/24.jpg" />
              </div>
              <div class="article-container col-8 col-md-8">
                <div class="tags">
                  <a href="#" class="tag-item">News</a>
                </div>
                <div class="article-header">
                  <h3>Android phone insides leaked</h3>
                </div>
                <div class="article-post-data">
                  <ul class="post-meta">
                    <li class="post-date">
                      21 October, 2017
                    </li>
                    <li class="post-author">
                      by <a href="#">ImAtWar</a>
                    </li>
                  </ul>
                </div>
                <div class="article-small-content">
                  <p>Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw...</p>
                </div>
              </div>
            </article>
            <article class="row py-2">
              <div class="image-container col-4 col-md-4">
                <img class="img-fluid" src="https://social.fritsoosterhoff.nl/img/uploads/images/1.jpg" />
              </div>
              <div class="article-container col-8 col-md-8">
                <div class="tags">
                  <a href="#" class="tag-item">News</a>
                </div>
                <div class="article-header">
                  <h3>Best looking desk</h3>
                </div>
                <div class="article-post-data">
                  <ul class="post-meta">
                    <li class="post-date">
                      21 October, 2017
                    </li>
                    <li class="post-author">
                      by <a href="#">ImAtWar</a>
                    </li>
                  </ul>
                </div>
                <div class="article-small-content">
                  <p>Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw...</p>
                </div>
              </div>
            </article>
            <article class="row py-2">
              <div class="image-container col-4 col-md-4">
                <img class="img-fluid" src="https://social.fritsoosterhoff.nl/img/uploads/images/4.jpg" />
              </div>
              <div class="article-container col-8 col-md-8">
                <div class="tags">
                  <a href="#" class="tag-item">News</a>
                </div>
                <div class="article-header">
                  <h3>Development IOS</h3>

                </div>
                <div class="article-post-data">
                  <ul class="post-meta">
                    <li class="post-date">
                      21 October, 2017
                    </li>
                    <li class="post-author">
                      by <a href="#">ImAtWar</a>
                    </li>
                  </ul>
                </div>
                <div class="article-small-content">
                  <p>Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw...</p>
                </div>
              </div>
            </article>
          </div>
        </div>


        <div class="col-md-4 pt-5">
          <h2>Interesting articles</h2>
          <div class="recent-articles">


            <div class="recent-article row py-2">
              <div class="col-3">
                <img class="img-fluid" src="https://social.fritsoosterhoff.nl/img/uploads/images/24.jpg" />
              </div>
              <div class="col-8">
                <h4>Android phone insides leaked</h4>
              </div>
            </div>
            <div class="recent-article row pb-2">
              <div class="col-3">
                <img class="img-fluid" src="https://social.fritsoosterhoff.nl/img/uploads/images/1.jpg" />
              </div>
              <div class="col-8">
                <h4>Best looking desk</h4>
              </div>
            </div>
            <div class="recent-article row pb-2">
              <div class="col-3">
                <img class="img-fluid" src="https://social.fritsoosterhoff.nl/img/uploads/images/3.jpg" />
              </div>
              <div class="col-8">
                <h4>Development IOS</h4>
              </div>
            </div>

            </div>
          </div>
        </div>

        </section>

	@endif
	@endsection
