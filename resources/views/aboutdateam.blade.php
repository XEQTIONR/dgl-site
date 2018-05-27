@extends('layouts.main')

@section('body-section')

  <div class="d-flex flex-column w-100 justify-content-center" style="height: 90vh;">
      <h1 class="text-center" style="font-family: 'AaronFaces'; font-size: 150px; font-weight: normal">L</h1>
      <h1 class="text-center">DateaM</h1>
      <p class="text-center">Dhaka, Bangladesh</p>
      <h5 class="text-uppercase text-center">estd: 2004</h5>
  </div>
  <div class="d-flex flex-column w-100 justify-content-center" style="height: 9vh">
    <a id="more" style="text-decoration: none" class="font-gray">
      <div class="row justify-content-center" >
        <span class="text-center">LEARN MORE</span>
      </div>
      <div class="row justify-content-center">
        <i class="fas fa-chevron-down"></i>
      </div>
    </a>

    <script>
      $('#more').click(function () {
          // alert($("#more").offset().top);
          $("html, body").animate({
              scrollTop: $("#more").offset().top
          }, 1000);
      })
    </script>
  </div>



<div id="about" class="row mt-2">
  <div class="col-12 px-0">
    <img src="{{URL::asset('storage/dtm-banner.png')}}" style="width: 100%;">
  </div>
</div>
<div class="row mt-5 justify-content-center">
  <div class="col-12 col-md-8">
  <h1>WHAT IS DATEAM?</h1>

  <h5 style= "border-left: 5px solid orange;" class="pl-3 my-5">Dateam is a Brotherhood, a Covenant,
    a Clan. It is an esports team (group of teams) sponsored by DGL for national and international esports competitions formed under our first ClanLord - DtM’DefCon13.
    ​</h5>
  <p>We were one of the most successful e-sports teams in Bangladesh from 2004-2010. We have played the best and we have beated the best.
    ​We disbanded in 2009 due to personal circumstances and mainly due to the state of affairs on esports in Bangladesh at the time.</p>

  <p>Right now most of us have retired from competitive gaming to pursue other aspirations. Right now we are artists, designers, engineers and entrepreneurs, doing our thing. Most of us choose to live quite private lives disconnected from the gaming community. Yet, we are always lurking , in some lobby, in some host, in some random pub game. This gaming thing doesn't die so easily.
    ​</p>
  <p>This generation of DateaM has ended and it is time to pass on the helm to what will be the next generation of DateaM. All we need is the ones who are worthy. Until then, we watch, we wait.
     </p>
  </div>
</div>

<div class="row" style="margin-top: 50px;">
  <div class="col-12 px-0">
    <img src="{{URL::asset('storage/dgl-players.png')}}" style="width: 100%;">
  </div>
</div>
<div class="row mt-5 justify-content-center">
  <div class="col-12 col-md-8">
    <h1 class="text-uppercase">Who's in dateam?</h1>
    <p>Historically, DtM has had two divisions under its brand - DateaM - or DateaM prime (DtM') and DateaM alpha (DtMα or DTA). The following is the final roster list for all divisions of dateam.</p>

    <h2>Dateam (<span style="color: orange">Prime</span>)</h2>

    <h3 class="mt-4">Dateam DotA All-stars</h3>
    <ul class="list-group">
      <li style= "border-left: 5px solid orange;" class="list-group-item">DtM′AquaNox</li>
      <li style= "border-left: 5px solid orange;" class="list-group-item">DtM′BAAL</li>
      <li style= "border-left: 5px solid orange;" class="list-group-item">DtM′ParaNox</li>
      <li style= "border-left: 5px solid orange;" class="list-group-item">DtM′PyroDynamics</li>
      <li style= "border-left: 5px solid orange;" class="list-group-item">DtM′The.Reaper</li>
      <li style= "border-left: 5px solid orange;" class="list-group-item">DtM′X E Q TIONR</li>
    </ul>

    <h5>Last tournament - BanglaGamer DOTA League - Season 1</h5>

    <h3 class="mt-4">Dateam Warcraft III - The Frozen Throne</h3>
    <ul class="list-group mb-5">
      <li style= "border-left: 5px solid orange;" class="list-group-item">DtM′The.Reaper</li>
      <li style= "border-left: 5px solid orange;" class="list-group-item">DtM′X E Q TIONR</li>
    </ul>

    <h3 class="mt-4">Dateam Guitar Hero - Legends of Rock / World Tour</h3>
    <ul class="list-group mb-5">
      <li style= "border-left: 5px solid orange;" class="list-group-item">DtM′King_Judas</li>
      <li style= "border-left: 5px solid orange;" class="list-group-item">DtM′ParaNox</li>
      <li style= "border-left: 5px solid orange;" class="list-group-item">DtM′X E Q TIONR</li>
    </ul>

    <h5>Last tournament - BanglaGamer DOTA League - Season 1</h5>

    <h3 class="mt-4">Dateam Forza Motorsports</h3>
    <ul class="list-group mb-5">
      <li style= "border-left: 5px solid orange;" class="list-group-item">DtM′AquaNox</li>
    </ul>


    <h2>Dateam <span style="color: red">Alpha</span></h2>

    <h3 class="mt-4">Dateam Alpha DotA All-stars</h3>
    <ul class="list-group mb-5">
      <li style= "border-left: 5px solid red;" class="list-group-item">DTA|CLOSER</li>
      <li style= "border-left: 5px solid red;" class="list-group-item">DTA|Ma[tt]</li>
      <li style= "border-left: 5px solid red;" class="list-group-item">DTA|HeirOfHades</li>
      <li style= "border-left: 5px solid red;" class="list-group-item">DTA|HellBoy</li>
      <li style= "border-left: 5px solid red;" class="list-group-item">DTA|Wings</li>
    </ul>
  </div>
</div>

<div class="row" style="margin-top: 50px;">
  <div class="col-12 px-0">
    <img src="{{URL::asset('storage/dgl-players3.png')}}" style="width: 100%;">
  </div>
</div>

<div class="row mt-5 justify-content-center">
  <div class="col-12 col-md-8">
    <h1 class="text-uppercase">Achievements</h1>
    <p>DateaM is one of the most successfull Bangladeshi clans in history, having participated and won in national and
      international tournaments in multiple e-sport divisions. Down below are notable achievements in reverse chronological order. </p>

    <ul class="list-group mb-5">
      <li style= "border-left: 5px solid gold;" class="list-group-item mb-3">World Cyber Games 2010 Bangladesh Qualifiers - Forza Motorsports Champion(Gold) - DtM′AquaNox</li>
      <li style= "border-left: 5px solid gold;" class="list-group-item mb-3">World Cyber Games 2009 Bangladesh Qualifiers - Warcraft III Champion(Gold) - DtM′The.Reaper</li>
      <li style= "border-left: 5px solid gold;" class="list-group-item mb-3">World Cyber Games Asia 2009 Bangladesh Qualifiers - Guitar Hero World Tour Champion(Gold) - DtM′KingJudas</li>
      <li style= "border-left: 5px solid silver;" class="list-group-item mb-3">World Cyber Games Asia 2009 Bangladesh Qualifiers - Guitar Hero World Tour Runner Up(Silver) - DtM′ParaNox</li>
      <li style= "border-left: 5px solid orange;" class="list-group-item mb-3">World Cyber Games Asia 2009 Bangladesh Qualifiers - Guitar Hero World Tour Third Place(Bronze) - DtM′X E Q TIONR</li>
      <li style= "border-left: 5px solid silver;" class="list-group-item mb-3">Malibag DotA tournament  2006 - Organized by SinEater - Runners Up - DateaM Alpha (DTA)</li>
      <li style= "border-left: 5px solid gold;" class="list-group-item mb-3">DGL DotA tournament 2006 - Champions - DateaM Alpha (DTA)</li>
    </ul>
  </div>
</div>
@endsection