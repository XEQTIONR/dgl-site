<!--
 * Copyright 2018 DAGAMELEAGUE

 ____    ___  __
(  _ \  / __)(  )
 )(_) )( (_-. )(__  / _/ _ \ '_/ -_)_/ _/ _ \ '  \
(____/  \___/(____) \__\___/_| \___(_)__\___/_|_|_|

@author XEQTIONR
@template register
-->
Hey {{$alias}} <br>
You have been invited to participate in tournament {{$tournament->name}} <br>
for team {{$team->name}} <br>
Please go to the following link to confirm your registration.
You are considered officially not on the roster until you have confirmed your spot. <br>
<a href="{{env('APP_URL','http://localhost:8000')}}/roster/{{$alias}}/{{$team->id}}">ROSTER CONFIRMATION LINK</a>