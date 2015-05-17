<!DOCTYPE html>
<html lang="en">
<head>
	@include('part.header', ['title'=>'關於'])
</head>
<body>
	<nav class="navbar navbar-inverse">
	  	<div class="container-fluid">
		    <div class="navbar-header">
		     	<a class="navbar-brand" href="{{url('/')}}">RakudaPack</a>
			</div>
		    <div>
			    <ul class="nav navbar-nav navbar-right">
			        <li><a href="login"><span class="glyphicon glyphicon-log-in"></span> 登入</a></li>
			        <li><a href="register"><span class="glyphicon glyphicon-user"></span> 快速註冊</a></li>
			    </ul>
		    </div>
		</div>
	</nav>
	<div class="jumbotron" style="">
	  	<h1>Hello, world!</h1>
	  	<p>...</p>
	  	<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
	</div>


</body>
</html>