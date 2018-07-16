@foreach($postsajax as $post)
  <div class="col-12 ">
    <!-- div for small screens -->
    <div class="row post-body mb-5 d-block d-md-none"  onclick="window.location.href='/news/{{$post->id}}'">
      <div class="col-12">
        <div class="thumbnail thumbnail-rect-smscreen">
          <img class="mt-3" src="{{$post->banner}}">
        </div>
      </div>
      <div class="col-12 mt-3 px-4 px-sm-5">
        <a class="post-link" href="/news/{{$post->id}}">
          <h3 class="post-title mt-3">{{$post->title}}</h3>
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
    <!-- div for large screens -->
    <div class="row post-body post-body-hover d-none d-md-flex" onclick="window.location.href='/news/{{$post->id}}'">
      <div class="thumbnail thumbnail-new my-3 mx-2">
        <img class="" src="{{$post->banner}}">
      </div>
      <div class="post-text">
        <a class="post-link" href="/news/{{$post->id}}">
          <h3 class="post-title">{{$post->title}}</h3>
        </a>
        <p class="time">{{$post->created_at->diffForHumans(Carbon\Carbon::now(), true)}} ago</p>
        <span>{!! $post->excerpt !!}</span>
      </div>
    </div>
  </div>
@endforeach