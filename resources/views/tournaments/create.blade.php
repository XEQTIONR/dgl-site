<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Create a new tournament</title>

    </head>
    <body>
      <form method="POST" action="/tournaments">
      {{csrf_field()}}
      Tournament Name <input type="text" name="name"> <br>
      Start date <input type="date" name="startdate"> <br>
      End date <input type="date" name="enddate"> <br>

      Description <textarea name="description" rows="4" cols="50"></textarea> <br>
      Rules <textarea name="rules" rows="4" cols="50"></textarea> <br>

      <button type="submit" value="submit">Submit</button>
      </form>
    </body>
</html>
