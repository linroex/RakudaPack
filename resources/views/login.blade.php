<!DOCTYPE html>
<html>
<head>
	@include('part.header', ['title'=>'登入'])
	<script>
		$('#myModal').on('shown.bs.modal', function () {
			$('#myInput').focus()
		})
		$('#myModal2').on('shown.bs.modal', function () {
			$('#myInput').focus()
		})	

		$(document).ready(function(){
			$("button[type=submit]").click(function(e){
				e.preventDefault();
				var params = $("form").serialize();
				$.get("/users/login" , params, function(data) {
					$(".notify_block").html('');

					if(data.code == 0){
						$.each(data.data, function(i, item){
							$(".notify_block").append(' <div class="alert alert-danger">' + item[0] + '</div> ');
						});
					}else if(data.code == 1){
						document.cookie = "token=" + data.token + ";path={{url('')}}";
						$(".notify_block").append(' <div class="alert alert-success">登入成功</div> ');
						setTimeout(function(){
							window.location = "{{url('/')}}";
						}, 500);
					}

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
	<div class=" col-md-offset-3 col-md-6">
		<div class="panel panel-default">
		  <div class="panel-heading">登入</div>
		  <div class="panel-body">
		    <form role="form">
	    		<div class="form-group">
	      			<label for="username">帳號</label>
	      			<input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
	    		</div>
	    		<div class="form-group">
	      			<label for="pwd">密碼</label>
	      			<input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password">
	    		</div>
	    		<div class="form-group">        
			      	<div class="col-md-offset-5 col-sm-10">
			        	<button class="btn btn-primary" type="submit">Submit</button>
			      	</div>
			    </div>

		  	</form>
		  </div>
		</div>
	</div>
	

</body>
</html>