
        @yield('sidebar_element')

        @foreach($sidebar as $type => $data)

          @switch($type)
            @case('articles')
              <div class="articles white-bg">
                <h2>Recent News</h2>
                <hr>
                @each('techmatters.article_simple',  $data, 'article')
              </div>
              @break

              @case('media')

                <div class="white-bg mt-5">

                  <h2>Recent photos</h2>
                  <hr>
                <!-- <div class="card-body"> -->
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

                @break

                @case('tags')
                  <div class="tags white-bg mt-5">
                    <h2>Tags</h2>
                    <hr>

                    @foreach($data as $tag)
                      <a href="{{url('tag/' . strtolower($tag->name))}}"> {{$tag->name}}</a>
                    @endforeach

                    </div>
                  @break
          @endswitch

        @endforeach
