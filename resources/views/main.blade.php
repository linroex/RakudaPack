<!DOCTYPE html>
<html>
<head>
	@include('part.header', ['title'=>'首頁'])
	<script>
		$('#myModal').on('shown.bs.modal', function () {
			$('#myInput').focus()
		})
		$('#myModal2').on('shown.bs.modal', function () {
			$('#myInput').focus()
		})	


	</script>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
        	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
	         	<span class="sr-only"></span>
	         	<span class="icon-bar"></span>
	         	<span class="icon-bar"></span>
	         	<span class="icon-bar"></span>
	      	</button>
            <a class="navbar-brand" href="{{url('/')}}">RakudaPack</a>
        </div>
        
        <div class="collapse navbar-collapse" id="menu">
	      	<ul class="nav navbar-nav navbar-right">
	         	@include('part.navbar')
	      	</ul>
	   	</div>
    </div>
</nav>	
</body>
</html>