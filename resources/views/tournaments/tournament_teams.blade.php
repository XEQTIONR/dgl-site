<div class="row tournament-row tournament-row-teams mb-5">
  <div class="col-12">
    <h1 class="font-blue py-3">Contending Teams</h1>
  </div>
  @foreach($contenders as $contender)
  <div class="col-6 col-md-4 mt-4">
    <div class="card team-logo-300">
      <img class="card-img-top" src="{{$contender->logo_size1}}" style="background-color: transparent" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title text-center">{{$contender->name}}</h5>
      </div>
    </div>
  </div>
  @endforeach
</div>