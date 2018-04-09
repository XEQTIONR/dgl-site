<div class="container">
    <div class="row" style="margin-top: 1.5rem; margin-bottom: 1.5rem;">
      <h3>Registered Teams</h3>
    </div>
    <div class="row" >
      <div class="col-xs-12">
        <table class="table table-striped">
          <tr style="background-color: #555299">
            <td style="color: white">Team Name</td>
            <td style="color: white">Team Tag</td>
            <td style="color: white">Status</td>
          </tr>
          @foreach($contenders as $contender)
          <tr>
            <td>{{$contender->name}}</td>
            <td>{{$contender->tag}}</td>
            <td>{{$contender->status}}</td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
</div>