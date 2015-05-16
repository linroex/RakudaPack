<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>登入 - RakudaPack</title>
	<link rel="stylesheet" href="{{url('css/all.min.css')}}">
	<link rel="stylesheet" href="{{url('css/style.css')}}">
	<script src="{{url('js/all.min.js')}}"></script>
	<script>
		$('#myModal').on('shown.bs.modal', function () {
			$('#myInput').focus()
		})
		$('#myModal2').on('shown.bs.modal', function () {
			$('#myInput').focus()
		})	

		$(document).ready(function(){
			$("#submit").click(function(e){
				e.preventDefault();
				var params = $("form").serialize();
				$.post("/users/login" , params, function(data) {
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