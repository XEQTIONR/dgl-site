<style>
  @import url('https://fonts.googleapis.com/css?family=Muli');

  body
  {
    font-family: Muli;
    font-size: 17px;
  }
  .row{
    width: 100%;
    display: flex;
    justify-content: center;
  }
  .col{
    width: 60%;
    min-width: 950px !important;
    /*padding-left: 5px;*/
    /*padding-right: 5px;*/
    /*border: 1px dashed blueviolet;*/
    /*background-color: #EFEFEF;*/

  }

  .col-main
  {
    /*padding-left: 40px;*/
    /*padding-right: 40px;*/
  }
  .logo{
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-top: 15px;
  }

  .logo + h2{
    color: white;
  }

  .text-center{
    text-align: center;
  }

  .button{
    display: block;
    margin: 20px auto;
    width: 30%;
    min-width: 200px;
    text-align: center;
    padding: 6px 0px;
    background-color: #6677CC;
    text-decoration: none;
    color: white;
  }
</style>
<div class="row">
  <div class="col" style="">
    <img class="logo" src="{{URL::asset('storage/DGLcolorLogo.png')}}"  alt="DaGameLeague Logo">
    {{--<img src="{{URL::asset('storage/banner-email.png')}}" width="100%">--}}
    {{--<h2 class="text-center">ĐAGAMELEAGUE</h2>--}}
  </div>
  {{--<hr>--}}
</div>
@yield('content')


<br>
<span style="font-size: 9px;">Please do not reply to this email. Any questions/comments should be sent to
  <span style="font-weight: bold;">admin@dglcore.com</span>
</span>