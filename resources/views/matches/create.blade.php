<!--
 * Copyright 2018 DAGAMELEAGUE

 ____    ___  __
(  _ \  / __)(  )
 )(_) )( (_-. )(__  / _/ _ \ '_/ -_)_/ _/ _ \ '  \
(____/  \___/(____) \__\___/_| \___(_)__\___/_|_|_|

  @author XEQTIONR
-->
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Create a new tournament</title>

</head>
<body>
<div id="app">
<form method="POST" action="/matches">
  {{csrf_field()}}
  Select Tournament
  <select name="tournament" v-model="tournament" v-on:change="getContestants()">
      <option disabled value="">Disabled</option>
    @foreach( $tournaments as $tournament )
      <option value="{{$tournament->id}}"> {{$tournament->name}} </option>
    @endforeach
  </select><br>
<ol v-if="tournament != ''">
  Number of contestants<input type="number" name="number" min="2" v-model=num><br>
  <li v-for="index in intNum">
  <select v-bind:name="'select['+index+']'">
    <option disabled value="" v-if="tournament ==''">Select a tournament first</option>
    <option v-for="contestant in contestants" v-bind:value="contestant.id">@{{ contestant.name }}</option>
  </select>
  </li>
</ol>
  <button type="submit" value="submit">Submit</button>
</form>
</div>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>

<script>

  let data = {
      contestants: [],
      tournament: '',
      num: "2"
  };
  var app = new Vue({
      el: '#app',
      data: data,
      computed:
      {
          intNum : function(){
              return parseInt(this.num);
          }
      },
      methods:
      {
          getContestants: function(){
              //console.log
              app.contestants.length = 0; //emptying the array
              axios.get('/matches/contestants/'+ app.tournament).then( function(response){
                let contestant_data = response.data;
                var i;

                for(i=0; i<contestant_data.length; i++)
                {
                    //app.contestants[i] = contestant_data[i];
                    Vue.set(app.contestants,i,contestant_data[i]);
                }
                app.selected_team = contestant_data[0].id; // initilizing the selected team to the first one

              });
          }
      }
  })
</script>
</body>
</html>
