<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登入 - RakudaPack</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
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
			        <li><a href="register.html"><span class="glyphicon glyphicon-user"></span> 快速註冊</a></li>
			        
			    </ul>
		    </div>
    	</div>
	</nav>


	<div id="login_form" class="col-md-offset-4 col-md-4">
		
		<h3 class="col-md-offset-3">Start RakudaPack!</h3>
		<form role="form">
    		<div class="form-group">
      			<label for="username">Username:</label>
      			<input type="text" class="form-control" id="username" placeholder="Enter username">
    		</div>
    		<div class="form-group">
      			<label for="pwd">Password:</label>
      			<input type="password" class="form-control" id="pwd" placeholder="Enter password">
    		</div>
    		<div class="form-group">        
		      	<div class="col-sm-offset-3 col-sm-10">
		        	<button class="btn btn-warning" type="submit" class="btn btn-default">Submit</button>
					<a href="register.html" class="btn btn-danger" role="button">立即註冊</a>
		      	</div>
		    </div>


			<div>
			</div>
			
	  	</form>
	</div>

</body>
</html>