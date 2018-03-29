@extends('layouts.main')
@section('body-section')
  <div class="row justify-content-center back-color-lightergray"> <!-- jumbotron row -->
    <div class="col-12 mt-md-5 no-horizontal-padding">
      <div class="jumbotron-fluid background-teams">
        <div class="row my-5 pt-5 justify-content-start">
          <div class="col-12 col-md-7 offset-md-1 col-xl-6 offset-xl-1 mt-10">
            <h1 class="display-4 text-center text-md-left">Teams</h1>
          </div>
          <div class="col-2 offset-3 offset-sm-4 offset-md-0 mt-10">
            {{--<img src="{{URL::asset('storage/tournament-icon-white-96.png')}}" height="130">--}}
          </div>
          <hr class="my-4">
        </div>
        <div class="row">
          <div class="col offset-1">
            <h2 class="">Competitive Bangladeshi E-sports teams.</h2>
          </div>
        </div>
        <div class="row">
          <div class="col offset-1">
            <p class="lead mr-4">Forces to be reckoned with in e-sports scene in Bangladesh</p>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- row -->
  <div class="row justify-content-center back-color-light"> <!-- the content row -->
    <div class="col-10">
      <div class="row mt-5">
        <div class="col">
          <h3 class="font-primary-color"> Select a tournament </h3>
        </div>
        <div class="col">
        <select name="cars">
          <option value="volvo">Volvo</option>
          <option value="saab">Saab</option>
          <option value="fiat">Fiat</option>
          <option value="audi">Audi</option>
        </select>
        </div>
      </div>
      <div class="row">

        <div class="col-3  my-3">
          <div class="card p-4 team-logo-300-gray">
            <img class="card-img-top" src="{{URL::asset('storage/team-8.png')}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title text-center font-purple">Overtime Esports</h5>
            </div>
          </div>
        </div>

        <div class="col-3  my-3">
          <div class="card p-4 team-logo-300-gray">
            <img class="card-img-top" src="{{URL::asset('storage/team-2.png')}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title text-center font-purple">Rise Clan</h5>
            </div>
          </div>
        </div>

        <div class="col-3  my-3">
          <div class="card p-4 team-logo-300-gray">
            <img class="card-img-top" src="{{URL::asset('storage/team-3.png')}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title text-center font-purple">Vaevictis Esports</h5>
            </div>
          </div>
        </div>

        <div class="col-3  my-3">
          <div class="card p-4 team-logo-300-gray">
            <img class="card-img-top" src="{{URL::asset('storage/team-5.png')}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title text-center font-purple">Lyon Gaming</h5>
            </div>
          </div>
        </div>

        <div class="col-3  my-3">
          <div class="card p-4 team-logo-300-gray">
            <img class="card-img-top" src="{{URL::asset('storage/team-4.png')}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title text-center  font-purple">MostWanted</h5>
            </div>
          </div>
        </div>

        <div class="col-3  my-3">
          <div class="card p-4 team-logo-300-gray">
            <img class="card-img-top" src="{{URL::asset('storage/team-6.png')}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title text-center font-purple">GLB Esports</h5>
            </div>
          </div>
        </div>

        <div class="col-3  my-3">
          <div class="card p-4 team-logo-300-gray">
            <img class="card-img-top" src="{{URL::asset('storage/team-7.png')}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title text-center font-purple">Apotheon Esports</h5>
            </div>
          </div>
        </div>

        <div class="col-3  my-3">
          <div class="card p-4 team-logo-300-gray">
            <img class="card-img-top" src="{{URL::asset('storage/team-9.png')}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title text-center  font-purple">SiN Gaming</h5>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div> <!-- content row-->
@endsection