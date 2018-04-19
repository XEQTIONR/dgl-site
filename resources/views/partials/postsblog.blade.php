@foreach($postsajax as $post)
<div class="row mb-5">
  <div class="col-12 col-md-3 offset-md-1">
    <div class="thumbnail thumbnail-rect d-none d-lg-inline-block">
      <img class="mt-3" src="{{$post->banner}}">
    </div>
    <div class="thumbnail thumbnail-sq-lg d-none d-md-inline-block d-lg-none">
      <img class="mt-3" src="{{$post->banner}}">
    </div>
    <div class="thumbnail thumbnail-rect-smscreen pl-0 d-block d-md-none">
      <img class="mt-3" src="{{$post->banner}}">
    </div>
  </div>
  <div class="col-10 offset-1 col-md-6 offset-md-1 offset-lg-0 mt-2">
    <div class="row">
      <h1 class="font-purple">{{$post->title}}</h1>
    </div>
    <div class="row">
      <div class="mt-1 mb-3 pr-4">
        <i class="fas fa-calendar-alt font-gray"></i>
        <span class="">
                {{ $post->created_at->format('j F Y') }}
                </span>
      </div>
      <div class="mt-1 mb-3 mr-3">
        <i class="fas fa-tags font-purple"></i>
        <span class="tag">Tournament</span>,
        <span class="tag">Overwatch</span>,
        <span class="tag">1st Division</span>
        <span class="tag">Overwatch</span>,
        <span class="tag">1st Division</span>
      </div>

      <p class="font-gray">This is the DOTA 2 All-Stars League. Lorem Ipsum dolor sit amet. Lorem Ipsum dolor sit amet Lorem Ipsum dolor sit amet Lorem Ipsum dolor sit amet Lorem Ipsum dolor sit amet.</p>
    </div>
    <div class="btn-dgl-contaianer-purple">
      <a href="/atournament" class="btn btn-lg btn-dgl">Read On</a>
    </div>
  </div>
</div><!-- post row -->
@endforeach