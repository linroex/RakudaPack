<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>任務記錄 - RakudaPack</title>
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

   	<div class="col-md-offset-2 col-md-8">

		<div class="panel panel-danger">
			<div class="panel-heading">
				<h3 class="panel-title">任務記錄</h3>
			</div>
		  	<div class="panel-body">
		  		<ul class="nav nav-tabs">
                    <li  class="active"><a href="#request2" data-toggle="tab">發出的任務</a></li>
                    <li><a href="#accept2" data-toggle="tab">收到的任務</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active"  id="request2">
                        <table class="table">
                            <tr>
                                <th>接任務日期</th>
                                <th>對象</th>     
                                <th>任務名稱</th>
                                <th>點數</th>
                                <th>結束時間</th>
                                <th>狀態</th>
                                <th>檢視</th>
                                <th>聊天室</th>
                            </tr>
                            <tr>
                                <td>2014/5/12</td>
                                <td>Smith</td>        
                                <td>blablablablablabla</td>
                                <td>50</td>
                                <td>2014/5/13 24:00</td>
                                <td><button class="btn btn-success">完成</button></td>
                                <td><button class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button></td>
                                <td><button class="btn btn-default"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></button></td>
                            </tr>
                            <tr>
                                <td>2014/5/12</td>
                                <td>Smith</td>        
                                <td>blablablablablabla</td>
                                <td>50</td>
                                <td>2014/5/13 24:00</td>
                                <td><button class="btn btn-danger">取消</button></td>
                                <td><button class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button></td>
                                <td><button class="btn btn-default"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></button></td>
                            </tr>
                            <tr>
                                <td>2014/5/12</td>
                                <td>Smith</td>        
                                <td>blablablablablabla</td>
                                <td>50</td>
                                <td>2014/5/13 24:00</td>
                                <td><button class="btn btn-warning">進行</button></td>
                                <td><button class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button></td>
                                <td><button class="btn btn-default"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></button></td>
                            </tr>
                            
                        </table>   
                        <div class="col-md-offset-5">
                            <ul class="pagination pagination-sm">
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                            </ul>
                        </div>   
                    </div>
                    <div class="tab-pane"  id="accept2">
                        <table class="table">
                            <tr>
                                <th>收任務日期</th>
                                <th>對象</th>     
                                <th>任務名稱</th>
                                <th>點數</th>
                                <th>結束時間</th>
                                <th>狀態</th>
                                <th>檢視</th>
                                <th>聊天室</th>
                            </tr>
                            <tr>
                                <td>2014/5/12</td>
                                <td>Smith</td>        
                                <td>blablablablablabla</td>
                                <td>50</td>
                                <td>2014/5/13 24:00</td>
                                <td><button class="btn btn-primary">完成</button></td>
                                <td><button class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button></td>
                                <td><button class="btn btn-default"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></button></td>
                            </tr>
                        </table> 
                        <div class="col-md-offset-5">
                            <ul class="pagination pagination-sm">
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                            </ul>
                        </div>
            

                    </div>
                    
            	</div>


			</div>
			
		</div>
	</div>


	
</body>
</html>