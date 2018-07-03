@foreach($postsajax as $post)
  <div class="col-12">
    <!-- div for small screens -->
    <div class="row post-body mb-5 bg-lightgray d-block d-sm-block d-md-none"  onclick="window.location.href='/news/{{$post->id}}'">
      <div class="col-12">
        <div class="thumbnail thumbnail-rect-smscreen">
          <img class="mt-3" src="{{$post->banner}}">
        </div>
      </div>
      <div class="col-12 mt-3 px-4 px-sm-5">
        <a class="post-link" href="/news/{{$post->id}}s">
          <h2 class="post-title mt-3">{{$post->title}}</h2>
        </a>
        <p class="time">{{$post->created_at->diffForHumans(Carbon\Carbon::now(), true)}} ago</p>
        <span>{!! $post->excerpt !!}</span>
      </div>
      <div class="col-12 mt-3 px-4 px-sm-5">
        <div class="btn-dgl-contaianer btn-dgl-container-gray">
          <a href="/news/{{$post->id}}" class="btn btn-lg btn-dgl">Read More</a>
        </div>
      </div>
    </div>
    <!-- div for medium screens -->
    <div class="row post-body mb-5 bg-lightgray mb-1 d-none d-md-flex d-lg-none" onclick="window.location.href='/news/{{$post->id}}'">
      <div class="col-4">
        <div class="thumbnail thumbnail-sq-lg">
          <img class="mt-3" src="{{$post->banner}}">
        </div>
      </div>
      <div class="col-8 col-lg-7">
        <a class="post-link" href="/news/{{$post->id}}">
          <h2 class="post-title mt-3">{{$post->title}}</h2>
        </a>
        <p class="time">{{$post->created_at->diffForHumans(Carbon\Carbon::now(), true)}} ago</p>
        <span>{!! $post->excerpt !!}</span>
        <div class="col-12 mt-3">
          <div class="btn-dgl-contaianer btn-dgl-container-gray">
            <a href="/news/{{$post->id}}" class="btn btn-lg btn-dgl">Read More</a>
          </div>
        </div>
      </div>
    </div>
    <!-- div for large screens -->
    <div class="row post-body bg-lightgray post-body-hover mb-5 d-none d-lg-flex" onclick="window.location.href='/news/{{$post->id}}'">
      <div class="col-4">
        <div class="thumbnail thumbnail-rect">
          <img class="mt-3" src="{{$post->banner}}">
        </div>
      </div>
      <div class="col-8 col-lg-7">
        <a class="post-link" href="/news/{{$post->id}}">
          <h2 class="post-title mt-3">{{$post->title}}</h2>
        </a>
        <p class="time">{{$post->created_at->diffForHumans(Carbon\Carbon::now(), true)}} ago</p>
        <span>{!! $post->excerpt !!}</span>
      </div>
    </div>
  </div>
@endforeach