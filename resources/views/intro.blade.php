<!DOCTYPE html>
<html lang="en">
<head>
	<title>歡迎使用RakudaPack!</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="{{url('css/all.min.css')}}">
	<link rel="stylesheet" href="{{url('css/style.css')}}">
	<script src="{{url('js/all.min.js')}}"></script>
	
</head>
<body data-spy="scroll" style="background-color:#fff">
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggla navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" rel="home" href="#home">
          <img src="{{url('image/logo_rakuda_s.png')}}">
        </a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="page-scroll active"><a href="#home">Home</a></li>
          <li class="page-scroll"><a href="#about">About</a></li>
          <li class="page-scroll"><a href="#service">Service</a></li>
          <li class="page-scroll"><a href="#team">Team</a></li>
          <li class="page-scroll"><a href="login"><span class="glyphicon glyphicon-log-in"></span> 登入</a></li>
          <li class="page-scroll"><a href="register"><span class="glyphicon glyphicon-user"></span> 快速註冊</a></li>
        </ul>
      </div>
    </div>  
  </div>
  <!-- <div class="container" style="background-image:url(../public/image/img1.jpeg)"></div> -->
  <div class="row" id="home">
    <img src="{{url('image/img1.jpg')}}" class="img-rounded">
  </div>
  <div class="row" id="about">
    <img src="{{url('image/img02.jpg')}}" class="img-rounded">
  </div>


<!--   <div class="row" id="service">
    <img src="{{url('image/img3.png')}}" class="img-rounded">
  </div> -->

  <div id="service" class="row" style="background-color:#fff; height:650px">
    <br><br><br>
    <h1 style="color:#fa8072" class="col-md-offset-2">你可以選擇 You can choose to...</h1>
    <br><br><br><br>
    <div class="col-md-offset-3 col-md-3">
      <img src="{{url('image/icon1.png')}}" alt="Linroex" style="width:200px;height:200px">
      <h3 style="color:#fa8072;" class="col-md-offset-2">接受任務</h3> 
      <h6 style="color:#918E89;" class="col-md-offset-1">點選地圖，找到想要完成的任務</h6>    
    </div>
    <div class="col-md-3">
      <img src="{{url('image/icon2.png')}}" alt="Yuchiang" style="width:200px;height:200px">
      <h3 style="color:#fa8072" class="col-md-offset-2">發起任務</h3>
      <h6 style="color:#918E89;" class="col-md-offset-1">填寫表單，發送自己的需求</h6>    
    </div>
    
  </div>

  <!--  <div class="row" id="team">
    <img src="{{url('image/img4.png')}}" class="img-rounded">
  </div> -->
  

  <div id="team" class="row" style="background-color:#F2E7D4; height:650px">
    <br><br><br>
    <h1 style="color:#fa8072" class="col-md-offset-2">團隊介紹 About Us</h1>
    <br><br><br><br>
    <div class="col-md-offset-2 col-md-3">
      <img src="{{url('image/mem_linroex.png')}}" alt="Linroex" style="width:200px;height:200px">
      <h3 style="color:#fa8072;" class="col-md-offset-3">CEO</h3>    
      <h6 style="color:#918E89;" class="col-md-offset-2">Linroex from NTUST</h6>    
    </div>
    <div class="col-md-3">
      <img src="{{url('image/mem_yu.png')}}" alt="Yuchiang" style="width:200px;height:200px">
      <h3 style="color:#fa8072">Front End Developer</h3>
      <h6 style="color:#918E89;" class="col-md-offset-2">Yuchiang from NTU</h6>    
    </div>
    <div class="col-md-3">
      <img src="{{url('image/mem_seisyo.png')}}" alt="Seisyo" style="width:200px;height:200px">
      <h3 style="color:#fa8072">Back End Developer</h3>
      <h6 style="color:#918E89;" class="col-md-offset-2">Seisyo from NTUST</h6>    
    </div>
  </div>

  


</body>
</html>