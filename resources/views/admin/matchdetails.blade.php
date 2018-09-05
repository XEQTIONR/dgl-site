<div class="container">
  <div class="row" style="margin-top: 1.5rem; margin-bottom: 1.5rem;">
    <h3>Match Contestants</h3>
  </div>
  <div class="row" >
    <div class="col-xs-12 col-md-10">
      <form method="post" action="/admin/score/{{$id}}">
        {{csrf_field()}}
        <table class="table table-striped">
          <tr style="background-color: #555299">
            <td style="color: white">Team Name</td>
            <td style="color: white">Team Tag</td>
            <td style="color: white">Clan</td>
            <td style="color: white">Status</td>
            <td style="color: white">Score</td>

          </tr>
          @foreach($contestants as $contender)
            <tr>
              <td>{{$contender->name}}</td>
              <td>{{$contender->tag}}</td>
              <td>{{$contender->contending_team->clan_id}}</td>
              <td>{{$contender->contending_team->status}}</td>
              <td><input name="{{$contender->id}}" value="{{$contender->score}}"> </td>
            </tr>
          @endforeach
        </table>

        <label>Winner</label>
        <select name="winner">
            <option value="none"></option>
          @foreach($contestants as $contender)
            @if($match->won_id == $contender->id)
              <option value="{{$contender->id}}" selected>{{$contender->name}}</option>
            @else
              <option value="{{$contender->id}}">{{$contender->name}}</option>
            @endif
          @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Update Scores</button>
      </form>
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
            <td style="color: white">Checkin Status</td>
          </tr>
          @foreach($contender->contending_team->roster as $aroster)
            <tr>
              <td>{{$aroster->gamer->alias}}</td>
              <td>{{$aroster->gamer->fname}} {{$aroster->gamer->lname}}</td>
              <td>{{$aroster->gamer->email}}</td>
                @php
                  $value = '<td style="color: red">NOT CHECKED IN</td>';
                  foreach($checkins as $checkin)
                  {
                    if($aroster->id == $checkin->roster_id)
                      $value = '<td style="color: green">CHECKED IN</td>';
                  }
                  echo $value;
                @endphp
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  @endforeach
</div>