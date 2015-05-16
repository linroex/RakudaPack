<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<title>註冊會員 - RakudaPack</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>	<script>
		$(document).ready(function(){
			$("#submit").click(function(e){
				e.preventDefault();
				var params = $("form").serialize();
				$.post("/users/register" , params, function(data) {
					console.log(data);
				});
			})
		});
	</script>
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
		    </ul>
		    </div>
    	</div>
	</nav>
	

	<div class="col-md-offset-2 col-md-8">
		<form role="form" class="col-md-offset-3 col-md-6">
    		<div class="form-group">
      			<label for="realname">真實姓名</label>
      			<input type="text" name="name" class="form-control" id="realname" placeholder="Enter your real name">
    		</div>
			<div class="form-group">
			    <label for="school">學校</label>
				<select name="school_id" class="form-control">
					<option>台灣科技大學</option>
					<option selected="true">台灣大學</option>
					<option>政治大學</option>
				</select>
			</div>
    		<div class="form-group">
      			<label for="email">學校信箱（請務必輸入學校信箱，作為認證）</label>
      			<input type="email" name="mail" class="form-control" id="email" placeholder='Enter "school" email'>
    		</div>
    		<div class="form-group">
      			<label for="username">帳號（請輸入100字內英文、數字）</label>
      			<input type="text" name="username" class="form-control" id="username" placeholder="Enter your username">
    		</div>
    		<div class="form-group">
      			<label for="pwd">密碼</label>
      			<input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password">
    		</div>
    		<div class="form-group">
      			<label for="pwd2">再次輸入密碼</label>
      			<input type="password" name="password_confirmation" class="form-control" id="pwd2" placeholder="Enter password again">
    		</div>
		    <div class="form-group">        
		      	<div class="col-sm-offset-3 col-sm-10">
		        	<button id="submit" type="submit" class="btn btn-default">Submit</button>
		        	<button type="reset" class="btn btn-default">Reset</button>
		      	</div>
		    </div>
	  	</form>
	</div>
</body>
</html>