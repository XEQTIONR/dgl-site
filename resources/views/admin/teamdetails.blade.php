<div class="container">
  <div class="row" style="margin-top: 1.5rem; margin-bottom: 1.5rem;">
    <h3>Roster</h3>
  </div>
  <div class="row" >
    <div class="col-xs-12">
      <table class="table table-striped">
        <tr style="background-color: #555299">
          <td style="color: white">Gamer ID</td>
          <td style="color: white">Alias</td>
          <td style="color: white">Name</td>
          <td style="color: white">Email</td>
          <td style="color: white">Status</td>
          @if($platform_slug == config('social.steam_slug'))
          <td style="color: white">Steam64ID</td>
          @endif
          <td style="color: white">Discord</td>
        </tr>
        <?php for($i=0; $i<count($gamers); $i++) : ?>
          <tr>
            <td>{{$gamers[$i]->id}}</td>
            <td>{{$gamers[$i]->alias}}</td>
            <td>{{$gamers[$i]->fname}} {{$gamers[$i]->lname}}</td>
            <td>{{$gamers[$i]->email}}</td>
            <td>{{$gamers[$i]->roster_entry->status}}</td>
            @if($platform_slug == config('social.steam_slug'))
            <td>{{$gamers[$i]->steamid}}</td>
            @endif
            <td>{{$gamers[$i]->discord_username}}</td>
          </tr>
        <?php endfor ?>
      </table>
    </div>
  </div>
</div>