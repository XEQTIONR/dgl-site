<div class="container">
  <div class="row" style="margin-top: 1.5rem; margin-bottom: 1.5rem;">
    <h3>Match Contestants</h3>
  </div>
  <div class="row" >
    <div class="col-xs-12">
      <table class="table table-striped">
        <tr style="background-color: #555299">
          <td style="color: white">Team Name</td>
          <td style="color: white">Team Tag</td>
          <td style="color: white">Clan</td>
          <td style="color: white">Status</td>
        </tr>
        @foreach($contestants as $contender)
          <tr>
            <td>{{$contender->contending_team->name}}</td>
            <td>{{$contender->contending_team->tag}}</td>
            <td>{{$contender->contending_team->clan_id}}</td>
            <td>{{$contender->contending_team->status}}</td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>