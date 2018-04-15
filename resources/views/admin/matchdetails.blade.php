<div class="container">
  <div class="row" style="margin-top: 1.5rem; margin-bottom: 1.5rem;">
    <h3>Match Contestants</h3>
  </div>
  <div class="row" >
    <div class="col-xs-12 col-md-10">
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
  <div class="row">
    <div class="col-xs-12">
      <h3>Rosters</h3>
    </div>
  </div>
  @foreach($contestants as $contender)
    <div class="row">
      <h4>{{$contender->contending_team->name}}</h4>
      <div class="col-xs-12 col-md-10">
        <table class="table table-striped">
          <tr  style="background-color: #555299">
            <td style="color: white">Alias</td>
            <td style="color: white">Name</td>
            <td style="color: white">Email</td>
          </tr>
          @foreach($contender->contending_team->roster as $aroster)
            <tr>
              <td>{{$aroster->gamer->alias}}</td>
              <td>{{$aroster->gamer->fname}} {{$aroster->gamer->lname}}</td>
              <td>{{$aroster->gamer->email}}</td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  @endforeach
</div>