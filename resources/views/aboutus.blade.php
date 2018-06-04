@extends('layouts.main')

@section('body-section')

  <div class="row justify-content-center mt-10">
    <div class="col-4">
      <img class="" src="{{URL::asset('storage/DGLCrownGray.svg')}}" />
    </div>
    <div class="col-12 my-5">
      <h1 class="text-center" style="color: #686a70; font-size: 60px">ĐAGAMELEAGUE</h1>
    </div>
  </div>
  <div class="row justify-content-center">
    <h1 class="text-center">Who we are</h1>
  </div>
  <div class="row justify-content-center">
    <div class="col-10">
    <p class="text-center">DGL is short for Da Game League. DGL was Bangladesh's first ever multiplayer gaming community.
      We say 'was' because we have been inactive due to the instability of the evolving nature of
      e-sports in the country.</p>
    </div>
  </div>
  <div class="row justify-content-center mt-5">
    <img  src="{{URL::asset('storage/WiredNetwork.png')}}">
    <img src="{{URL::asset('storage/Network.png')}}" width="128" height="128">
  </div>
  <div class="row justify-content-center">
    <div class="col-12 mt-5">
      <h1 class="text-center">Who we were and why we are back</h1>
    </div>
    <div class="col-10">
      <p class="text-center">DGL is a non-profit organization dedicated to promoting multiplayer competitive gaming in
        Bangladesh. Those two words before 'gaming' are very important to us.
      </p>
      <p class="text-center">This is during the early humble beginnings of competitve e-sports in the country when
        satisfactory internet connections for gaming were still not available. This gave rise to (LAN) gaming-cafe
        culture in Bangladesh. Under these circumstances the first ever known DotA game was hosted on Bangladeshi
        soil in the mid 2000.
      </p>
      <p class="text-center">
        DGL has existed in many forms. We started out as a online forum, but quickly expanded to become a respected
        e-sports organizational body. We have organized various tournaments, LAN parties and other events in that time.
        We have volunteered at national gaming events such as the World Cyber Games (WCG) Bangladesh, NSU tournaments
        (including first one) and various others. We have also sponsored various gamers and teams in national and
        international competitions, such include various (WCG /WCG Asia) tournaments.
      </p>
      <p class="text-center">
        Internet connections have improved, there are now big sponsored e-sports tournaments around the country.
        But the multiplayer scene is in shambles. Though the community is larger it lacks the organization and regular
        competitive opportunity it need to grow. That is where we come in as we have done in the past.
      </p>
    </div>

  </div>
  <div class="row justify-content-center  mt-5">
    <div class="col-12 mt-5">
      <h1 class="text-center">What to expect</h1>
    </div>
  </div>
  <div class="row justify-content-center">
    <img  src="{{URL::asset('storage/Router.png')}}">
  </div>
  <div class="row justify-content-center mt-4">
    <div class="col-12">
      <h3 class="text-center font-purple">We go fully online</h3>
    </div>
    <div class="col-10">
    <p class="text-center">We are no longer doing physical LAN tournaments. All our tournaments are going to be hosted
      online.</p>
    </div>
  </div>

  <div class="row justify-content-center">
    <img  src="{{URL::asset('storage/Cup.png')}}">
    <img src="{{URL::asset('storage/Tree.png')}}">
  </div>
  <div class="row justify-content-center mt-4">
    <div class="col-12">
      <h3 class="text-center font-purple">More tournaments, More competition, more gaming, less everything else.</h3>
    </div>
    <div class="col-10">
      <p class="text-center">Moving away from LAN tournaments detaches us from a lot of organizational/logistical
        headaches. Now we can focus on what we love doing best - hosting more competitive e-sports tournaments of various formats.
        </p>
    </div>
  </div>
  <div class="row">
    <hr class="w-100">
  </div>
  <div class="row justify-content-center">
    <img  src="{{URL::asset('storage/calendarstar.png')}}">
  </div>
  <div class="row justify-content-center mt-4">
    <div class="col-12">
      <h3 class="text-center font-purple">Real-time tournament schedules</h3>
    </div>
    <div class="col-10">
      <p class="text-center">Moving away from LAN tournaments detaches us from a lot of organizational/logistical
        headaches. Now we can focus on what we love doing best - hosting more competitive e-sports tournaments of various formats.
      </p>
    </div>
  </div>
  <div class="row justify-content-center">
    <img  src="{{URL::asset('storage/calendarThu.png')}}">
    <img  src="{{URL::asset('storage/calendarFri.png')}}">
    <img  src="{{URL::asset('storage/calendarSat.png')}}">
  </div>
  <div class="row justify-content-center mt-4">
    <div class="col-12">
      <h3 class="text-center font-purple">Match Days.</h3>
    </div>
    <div class="col-10">
      <p class="text-center">Tournament matches are usually conveniently scheduled in and around the weekends.
      </p>
    </div>
  </div>
  <div class="row">
    <hr class="w-100">
  </div>
  <div class="row justify-content-center">
    <img  src="{{URL::asset('storage/iconMic.png')}}">
  </div>
  <div class="row justify-content-center mt-4">
    <div class="col-12">
      <h3 class="text-center font-purple">Match broadcasts and commentary</h3>
    </div>
    <div class="col-10">
      <p class="text-center">Match commentary and other programs about competitive or just simply gaming.
      </p>
    </div>
  </div>
  <div class="row justify-content-center">
    <img  src="{{URL::asset('storage/iconRewind.png')}}">
  </div>
  <div class="row justify-content-center mt-4">
    <div class="col-12">
      <h3 class="text-center font-purple">Replays and more</h3>
    </div>
    <div class="col-10">
      <p class="text-center">Links to all our tournament match replays are immediately updated on the site ready to be viewed. Never miss a game, it better than cable TV.
      </p>
    </div>
  </div>
  <div class="row">
    <hr class="w-100">
  </div>
  <div class="row justify-content-center">
    <img  src="{{URL::asset('storage/iconSteam.png')}}">
    <img  src="{{URL::asset('storage/iconBattleNet.png')}}" width="128" height="128">
  </div>
  <div class="row justify-content-center mt-4">
    <div class="col-12">
      <h3 class="text-center font-purple">Official game servers, and rooms.</h3>
    </div>
    <div class="col-10">
      <p class="text-center">Forget third party apps. Play in official tournament game servers, in official game rooms.
        Better performance, fewer lag spikes, more spectators.
      </p>
    </div>
  </div>
  <div class="row">
    <hr class="w-100">
  </div>
  <div class="row justify-content-center">
    <img  src="{{URL::asset('storage/Contact.png')}}">
  </div>
  <div class="row justify-content-center mt-4">
    <div class="col-12">
      <h3 class="text-center font-purple">Gamer and team profiles</h3>
    </div>
    <div class="col-10">
      <p class="text-center">Register yourself among the top pro gamers in Bangladesh. You are not the only one, Get social.
      </p>
    </div>
  </div>
  <div class="row justify-content-center">
    <img  src="{{URL::asset('storage/Sword.png')}}">
    <img  src="{{URL::asset('storage/Arrow.png')}}">
  </div>
  <div class="row justify-content-center mt-4">
    <div class="col-12">
      <h3 class="text-center font-purple">Different Gamers, different skill-sets</h3>
    </div>
    <div class="col-10">
      <p class="text-center">Browse through our game and team profiles. Maybe you are looking to recruit a Carry for your DOTA 2 clan or maybe a DPS for your Overwatch team.
      </p>
    </div>
  </div>
  <div class="row">
    <hr class="w-100">
  </div>
  <div class="row justify-content-center">
    <img  src="{{URL::asset('storage/Vader.png')}}">
  </div>
  <div class="row justify-content-center mt-4">
    <div class="col-12">
      <h3 class="text-center font-purple">Clan Wars</h3>
    </div>
    <div class="col-10">
      <p class="text-center">Challenge other top team to exhibition matches.
      </p>
    </div>
  </div>
  <div class="row justify-content-center">
    <img  src="{{URL::asset('storage/Twitch.png')}}">
    <img  src="{{URL::asset('storage/Discord.png')}}">
  </div>
  <div class="row justify-content-center mt-4">
    <div class="col-12">
      <h3 class="text-center font-purple">Every sport needs spectators.</h3>
    </div>
    <div class="col-10">
      <p class="text-center">Being a pro-gamer is more than just gaming. Put yourself out there for the world to see.
        Let us show you how.
      </p>
    </div>
  </div>
  <div class="row">
    <hr class="w-100">
  </div>
  <div class="row justify-content-center">
    <img  src="{{URL::asset('storage/Idea.png')}}">
    <img  src="{{URL::asset('storage/Dumbbell.png')}}">
    <img  src="{{URL::asset('storage/Strategy.png')}}">
  </div>
  <div class="row justify-content-center mt-4">
    <div class="col-12">
      <h3 class="text-center font-purple">ALTAS - Always Learn Train And Strategize.</h3>
    </div>
    <div class="col-10">
      <p class="text-center">The more you train the better you get. The better strategy always has the theoretical
        advantage. DGL tournaments provides the opportunity for semi-pro players to break out of their skill category
        and reach pro-level.
      </p>
    </div>
  </div>
  <div class="row">
    <hr class="w-100">
  </div>
  <div class="row justify-content-center">
    <img  src="{{URL::asset('storage/heartmouse.png')}}">
  </div>
  <div class="row justify-content-center mt-4 mb-5">
    <div class="col-12">
      <h3 class="text-center font-purple">We care for e-sports.</h3>
    </div>
    <div class="col-10">
      <p class="text-center">Competitve gaming has always been a niche market. As such there is very little opportunity
        for upcoming gamers. DGL is dedicated to supporting upcoming Bangladeshi gamers and clans.
      </p>
    </div>
  </div>
@endsection
