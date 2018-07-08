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
        <p class="time">{{\Carbon\Carbon::parse($post->created_at,config('app.timezone'))->setTimezone(config('app.user_timezone'))->format('j F Y')}}</p>
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
      <div class="thumbnail thumbnail-new my-3 ml-2">
        <img class="" src="{{$post->banner}}">
      </div>
      <div class="post-text">
        <a class="post-link" href="/news/{{$post->id}}">
          <h3 class="post-title">{{$post->title}}</h3>
        </a>
        <p class="time">
          <i class="fas fa-calendar-alt"></i>
          {{\Carbon\Carbon::parse($post->created_at,config('app.timezone'))->setTimezone(config('app.user_timezone'))->format('j F Y')}}
        </p>
        <span>{!! $post->excerpt !!}</span>
      </div>
    </div>
  </div>
@endforeach




{{--@foreach($postsajax as $post)--}}
  {{--<div class="row mb-5">--}}
    {{--<div class="col-12 col-md-3 offset-md-1">--}}
      {{--<div class="thumbnail thumbnail-rect d-none d-lg-inline-block">--}}
        {{--<img class="mt-3" src="{{$post->banner}}">--}}
      {{--</div>--}}
      {{--<div class="thumbnail thumbnail-sq-lg d-none d-md-inline-block d-lg-none">--}}
        {{--<img class="mt-3" src="{{$post->banner}}">--}}
      {{--</div>--}}
      {{--<div class="thumbnail thumbnail-rect-smscreen pl-0 d-block d-md-none">--}}
        {{--<img class="mt-3" src="{{$post->banner}}">--}}
      {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-10 offset-1 col-md-6 offset-md-1 offset-lg-0 mt-2">--}}
      {{--<div class="row">--}}
        {{--<h3 class="font-purple">{{$post->title}}</h3>--}}
      {{--</div>--}}
      {{--<div class="row">--}}
        {{--<div class="mt-1 mb-3 pr-4">--}}
          {{--<i class="fas fa-calendar-alt font-gray"></i>--}}
          {{--<span class="font-light-gray">--}}
                {{--{{\Carbon\Carbon::parse($post->created_at,config('app.timezone'))->setTimezone(config('app.user_timezone'))->format('j F Y')}}--}}
                {{--</span>--}}
        {{--</div>--}}
        {{--<div class="mt-1 mb-3 mr-3">--}}
          {{--<i class="fas fa-tags font-purple"></i>--}}
          {{--<span class="tag font-light-gray">Tournament</span>,--}}
          {{--<span class="tag font-light-gray">Overwatch</span>,--}}
          {{--<span class="tag font-light-gray">1st Division</span>--}}
          {{--<span class="tag font-light-gray">Overwatch</span>,--}}
          {{--<span class="tag font-light-gray">1st Division</span>--}}
        {{--</div>--}}

        {{--<span class="font-gray">{!! $post->excerpt !!}</span>--}}
      {{--</div>--}}
      {{--<div class="btn-dgl-contaianer-purple">--}}
        {{--<a href="/news/{{$post->id}}" class="btn btn-lg btn-dgl">Read On</a>--}}
      {{--</div>--}}
    {{--</div>--}}
  {{--</div><!-- post row -->--}}
{{--@endforeach--}}