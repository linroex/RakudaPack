<!DOCTYPE html>
<html>
<head>
	@include('part.header', ['title'=>'會員資料'])
	<script src="{{url('js/all.min.js')}}"></script>
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
                    	<a type="button" class="btn btn-default navbar-btn" href="{{url('/')}}">我要接任務</a>
					  	
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
                	@include("part.dropdown")
            	</li>
	      	</ul>
	   	</div>
    </div>
</nav>

   <div class="col-md-offset-2 col-md-8">

		<div class="panel panel-danger">
				<div class="panel-heading">
					<h3 class="panel-title">會員資料	</h3>
				</div>
		  	<div class="panel-body">
		  		<br>
		    	<div class="col-md-offset-2 col-md-8">
              <table class="table">
                <tbody>
                  <tr>
                    <td><span class="glyphicon glyphicon-star" aria-hidden="true"></span> <span class="hidden-sm hidden-xs">姓名</span></td>
                    <td>YuChiang</td>
                  </tr>
                  <tr>
                    <td><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <span class="hidden-sm hidden-xs">學校</span></td>
                    <td>ntu</td>
                  </tr>
                  <tr>
                    <td><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> <span class="hidden-sm hidden-xs">學校信箱</span></td>
                    <td>b02902095@ntu</td>
                  </tr>
                  <tr>
                    <td><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <span class="hidden-sm hidden-xs">帳號</span></td>
                    <td>yuchiang</td>
                  </tr>
                  <tr>
                    	<td><span class="glyphicon glyphicon-file" aria-hidden="true"></span> <span class="hidden-sm hidden-xs">密碼</span></td>
                    	<td><a href="">（更改密碼？）</a>	</td>
                    	
                  </tr>
                </tbody>
              </table>
            </div>
		  	</div>
		</div>
	</div>


</body>
</html>