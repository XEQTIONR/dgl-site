<!--
 * Copyright 2018 DAGAMELEAGUE
_____     ____  ___
 ||  \\  //  \\ ||
 ||   || || ___ ||  __
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
    <input type="text" name="theinput">
    <button type="submit" value="submit">Submit</button>
</form>


</body>
</html>
