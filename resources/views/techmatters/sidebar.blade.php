
			<section class="col-md-4 sidebar">

        @foreach($sidebar as $type => $data)

          @switch($type)
            @case('articles')
              <div class="articles white-bg">
                <h2>Recent News</h2>
                @each('techmatters.article_simple',  $data, 'article')
              </div>
              @break

              @case('media')
              <div class="card mt-5">
                <div class="card-header">
                  Recent Photos
                </div>

                <div class="card-body">
                  <div class="row">
                    @foreach($data as $image)
                    <div class="col-4 py-3">
                      <?php $path = unserialize($image->image)[0] ?>
                      <a href="{{url('post/' . $image->id)}}">
                        <img src="{{ (strpos($path, 'http')===false) ? url('public/img/uploads/images/' . $path) : $path}}" class="img-fluid"> </a>
                      </div>

                      @endforeach
                    </div>
                  </div>
                </div>
                @break
          @endswitch

        @endforeach

       </section>
