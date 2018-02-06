<!--
 * Copyright 2018 DAGAMELEAGUE
_____     ____  ___
 ||  \\  //  \\ ||
===   || || ___ ||  __
_||__//  \\__// ||__||core.com

@author XEQTIONR

-->
<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register for {{$tournament->name}}</title>

</head>
<body>
<form method="POST" action="/tournaments/{{$tournament->id}}/register">
    {{csrf_field()}}
    Team Name <input type="text" name="name"><br>
    Team Tag <input type="text" name="tag"><br>
    <ol>
        <span>Team captain</span><br>
        <li>
            Your Registered <br>
            Email Address <input type="email" name="email"> OR DGLusername <input type="text" name="alias"><br>
        </li>
        <hr>
    @for($i=1; $i<$tournament->squadsize; $i++)

        @if( $i == $tournament->esport->teamsize)
            <hr>
            <hr>
        @endif
        <li>

            Email Address <input type="email" name="email"> OR DGLusername <input type="text" name="alias"><br>

        </li>
    @endfor
    </ol>
    <input type="checkbox">I confirm that I have read and understood the rules and regulations of the tournament. I understand that if I am in violation of these rules, I or my team maybe disqualified from the tournament and/or banned from DGL.

    <br>

    <button type="submit" value="submit">Submit</button>
</form>


</body>
</html>
