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
        <li>
          <a href="#home-slider" class="navbar-brand">RakudaPack</a>
        </li>        
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="page-scroll active"><a href="#home">Home</a></li>
          <li class="page-scroll"><a href="#about">About</a></li>
          <li class="page-scroll"><a href="#service">Service</a></li>
          <li class="page-scroll"><a href="#team">Team</a></li>
        </ul>
      </div>
    </div>  
  </div>
  <div>
    <!-- <div class="container" style="background-image:url(../public/image/img1.jpeg)"></div> -->
    <div class="row" id="home">
      <img src="{{url('image/img1.jpg')}}" class="img-rounded">
    </div>
    <div class="row" id="about">
      <img src="{{url('image/img02.jpg')}}" class="img-rounded">
    </div>
    <div class="row" id="service">
      <img src="{{url('image/img3.png')}}" class="img-rounded">
    </div>
    <div class="row" id="team">
      <img src="{{url('image/img4.png')}}" class="img-rounded">
    </div>
  </div>
  

  


</body>
</html>