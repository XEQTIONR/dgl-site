<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
<li><a href='{{ backpack_url("elfinder")}}'><i class='fa fa-files-o'></i> <span>File manager</span></a></li>
<li><a href="{{ backpack_url('gamer') }}"><i class="fa fa-user-circle-o"></i> <span>Registered Gamers</span></a></li>
<li><a href="{{ backpack_url('blog_post') }}"><i class="fa fa-newspaper-o"></i> <span>Blog</span></a></li>
<li><a href="{{ backpack_url('tournament') }}"><i class="fa fa-trophy"></i> <span>Tournaments</span></a></li>
<li><a href="{{ backpack_url('esport') }}"><i class="fa fa-gamepad"></i> <span>Esports</span></a></li>
<li><a href="{{ backpack_url('contending_team') }}"><i class="fa fa-group"></i> <span>Contending Teams</span></a></li>
<li><a href="{{ backpack_url('match') }}">
    <img src="{{URL::asset('storage/matchesicon.svg')}}" height="18" style="margin-right: 6px">
    <span>Matches</span>

  </a>
</li>
<li><a href="{{ backpack_url('match_contestant') }}"><i class="fa fa-bar-chart"></i> <span>Scores</span></a></li>