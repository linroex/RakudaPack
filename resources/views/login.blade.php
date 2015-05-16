<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<html lang="en">

<title>登入 - RakudaPack</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	

</head>
<body>
	<nav class="navbar navbar-inverse">
  	<div class="container-fluid">
	    <div class="navbar-header">
	     	<a class="navbar-brand" href="index.html">RakudaPack</a>
		</div>
	    <div>
	    
		    <ul class="nav navbar-nav navbar-right">
		        <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> 登入</a></li>
		        <li><a href="register.html"><span class="glyphicon glyphicon-user"></span> 快速註冊</a></li>
		    </ul>
	    </div>
	</div>
</nav>
	


	<div id="login_form" class="col-md-offset-4 col-md-4">
		
		<h3 class="col-md-offset-3">Start RakudaPack!</h3>
		<form role="form">
    		<div class="form-group">
      			<label for="username">帳號</label>
      			<input type="text" class="form-control" id="username" placeholder="Enter username">
    		</div>
    		<div class="form-group">
      			<label for="pwd">密碼</label>
      			<input type="password" class="form-control" id="pwd" placeholder="Enter password">
    		</div>
    		<div class="form-group">        
		      	<div class="col-sm-offset-4 col-sm-10">
		        	<button class="btn btn-primary" type="submit">Submit</button>
		      	</div>
		    </div>

	  	</form>
	</div>

</body>
</html>