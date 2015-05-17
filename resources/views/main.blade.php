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
	         	<li>
                    <div class="btn-group" role="group" >
                    	<a type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#myModal">我要發任務</a>
                    	<a type="button" class="btn btn-default navbar-btn" href="/">我要接任務</a>
					  	
					</div>
                    <!-- Modal -->
                    @include("part.newMission")
                </li>
                <li>
                    <a data-toggle="modal" data-target="#myModal2"><span class="badge badge-important">4</span>項進行中任務</a>
                    <!-- Modal -->
                    @include("part.nowMission")
                    
                </li>
                <li>
                    <a href="point"><span class="badge badge-important">100</span>點</a>
                </li>
                <li class="dropdown">
                	<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> username <span class="caret"></span></a>
                	<ul class="dropdown-menu" role="menu">
		               	<li><a href="member">會員資料</a></li>
		               	<li><a href="mission">任務記錄</a></li>
		               	<li><a href="point">點數記錄</a></li>
		               	<li class="divider"></li>
		               	<li><a href="#">登出</a></li>
                	</ul>
            	</li>
	      	</ul>
	   	</div>
    </div>
</nav>	
</body>
</html>