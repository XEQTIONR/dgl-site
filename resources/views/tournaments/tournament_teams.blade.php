<div class="row tournament-row tournament-row-teams mb-5">
  <div class="col-12">
    <h1 class="font-white py-3">Contending Teams</h1>
  </div>
  <div class="row mx-3 pb-3 px-2 w-100">
  @foreach($contenders as $contender)
  <div class="col-12 col-sm-6 col-md-4 mt-4">
    <div class="card bg-gray2 p-2">
      <img class="card-img-top" src="{{$contender->logo_size1}}" style="background-color: transparent" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title text-center font-gray">{{$contender->name}}</h5>
      </div>
    </div>
  </div>
  @endforeach
  </div>
</div>