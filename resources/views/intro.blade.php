<!DOCTYPE html>
<html lang="en">
<head>
	<title>歡迎使用RakudaPack!</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="{{url('css/all.min.css')}}">
	<link rel="stylesheet" href="{{url('css/style.css')}}">
	<script src="{{url('js/all.min.js')}}"></script>
	
</head>
<body data-spy="scroll" data-target=".navbar-fix-top" style="background-color:#fff background-image:{{url('image/img1.jpg')}}">
  <div class="navbar navbar-inverse navbar-fix-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggla navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <li>
          <a href="#home-slider" class="navbar-brand">RakudaPack</a>
        </li>        
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="page-scroll active"><a href="#home-slider">Home</a></li>
          <li class="page-scroll"><a href="#about">About</a></li>
          <li class="page-scroll"><a href="#service">Service</a></li>
          <li class="page-scroll"><a href="#team">Team</a></li>
          <li class="page-scroll"><a href="login">登入</a></li>
          <li class="page-scroll"><a href="register">快速註冊</a></li>
          <!-- <li class="page-scroll"><a href="login"><span class="glyphicon glyphicon-log-in"></span> 登入</a></li> -->
          <!-- <li class="page-scroll"><a href="register"><span class="glyphicon glyphicon-user"></span> 快速註冊</a></li> -->
          <!-- <li><a href="login"><span class="glyphicon glyphicon-log-in"></span> 登入</a></li> -->
          <!-- <li><a href="register"><span class="glyphicon glyphicon-user"></span> 快速註冊</a></li> -->
      </div>
    </div>  
  </div>
  <div>
    <!-- <div class="container" style="background-image:url(../public/image/img1.jpeg)"></div> -->
    <div class="row">
      <img src="{{url('image/img1.jpg')}}" class="img-rounded">
      <div class="col-lg-8">
        <!-- <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> -->
        <p><a class="btn btn-warning btn-lg" href="{{url('register')}}" role="button">立即註冊</a></p>
      </div>
    </div>
  </div>
  

  


</body>
</html>