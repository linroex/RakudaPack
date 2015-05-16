<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<html lang="en">

<title>會員資料 - RakudaPack</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>	

</head>
<body>
	<script>
	$('#myModal').on('shown.bs.modal', function () {
		$('#myInput').focus()
	})
	$('#myModal2').on('shown.bs.modal', function () {
		$('#myInput').focus()
	})		
</script>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="main.html">RakudaPack</a>
        </div>
        <div>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <div class="btn-group" role="group" >
                    	<button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#myModal">我要發任務</button>
                    	<button type="button" class="btn btn-default navbar-btn" href="main.html">我要接任務</button>
					  	
					</div>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    	<div class="modal-dialog">
                        	<div class="modal-content">
                            	<div class="modal-header">
                                	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                                <h4 class="modal-title" id="myModalLabel">新增任務</h4>
    	                        </div>
        	                    <div class="modal-body">
            	                    <div class="form-group">
                	                    <label for="mission">任務名稱（30字內）</label>
                    	                <input type="text" class="form-control" id="mission" placeholder="簡短描述任務名稱">
                        	        </div>
                                	<div class="form-group">
	                                    <label for="where">面交地點</label>
	                                    <input type="text" class="form-control" id="where" placeholder="請輸入校園地點（如：小福2樓），並點選下列地圖">
	                                </div>
	                                <div class="form-group">
	                                    <label for="when">面交時間</label>
	                                    <input type="time" name="when" class="form-control" placeholder="請輸入「與對方面交」的時間">
	                                </div>
	                                <div class="form-group">
	                                    <label for="point">點數</label>
	                                    <select class="form-control">
	                                        <option>5點</option>
	                                        <option>10點</option>
	                                        <option>15點</option>
	                                        <option>20點</option>
	                                        <option>25點</option>
	                                        <option>30點</option>
	                                        <option>35點</option>
	                                        <option>40點</option>
	                                        <option>45點</option>
	                                        <option>50點</option>
	                                    </select>
	                                </div>
	                                <div>
	                                    <label for="point">備註</label>
	                                    <textarea name="other" class="form-control" placeholder="備註" id="other" cols="30" rows="10"></textarea>

	                                </div>
                            	</div>
	                            <div class="modal-footer">
	                                <button type="button" class="btn btn-default" data-dismiss="modal">預覽</button>
	                                <button type="button" class="btn btn-primary">送出</button>
	                            </div>
	                        </div>
	                    </div>                      
                    </div>                      
                </li>
                <li>
                    <a data-toggle="modal" data-target="#myModal2"><span class="badge badge-important">4</span>項進行中任務</a>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      	<div class="modal-dialog">
	                        <div class="modal-content">
	                            <div class="modal-header">
	                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                                <h4 class="modal-title" id="myModalLabel">現正進行中</h4>
	                            </div>
	                            <div class="modal-body">
	                                <ul class="nav nav-tabs">
	                                    <li  class="active"><a href="#request" data-toggle="tab">發出的任務</a></li>
	                                    <li><a href="#accept" data-toggle="tab">收到的任務</a></li>
	                                </ul>
	                            	<div class="tab-content">
		                                <div class="tab-pane active"  id="request">
		                                    <table class="table">
		                                        <tr>
		                                            <th>對方帳號</th>
		                                            <th>任務名稱</th>     
		                                            <th>面交時間</th>
		                                            <th>面交地點</th>
		                                            <th>給予點數</th>
		                                        </tr>
		                                        <tr>
		                                            <td>Jill</td>
		                                            <td>Smith</td>        
		                                            <td>50</td>
		                                            <td>50</td>
		                                            <td>50</td>
		                                        </tr>
		                                        
		                                    </table>    
		                                </div>
		                                <div class="tab-pane"  id="accept">
		                                    <table class="table">
		                                        <tr>
		                                            <th>對方帳號</th>
		                                            <th>任務名稱</th>     
		                                            <th>面交時間</th>
		                                            <th>面交地點</th>
		                                            <th>給予點數</th>
		                                        </tr>
		                                        <tr>
		                                            <td>Jill</td>
		                                            <td>Jill</td>
		                                            <td>Jill</td>
		                                            <td>Jill</td>
		                                            <td>Jill</td>
		                                        </tr>
		                                        <tr>
		                                            <td>Eve</td>
		                                            <td>Eve</td>
		                                            <td>Eve</td>
		                                            <td>Eve</td>
		                                            <td>Eve</td>
		                                        </tr>
		                                    </table>    
		                                </div>
	                            	</div>
	                        	</div>
		                        <div class="modal-footer">
		                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
		                        </div>
                    		</div>
                		</div>
            		</div>
                </li>
                <li>
                    <a href="point.html"><span class="badge badge-important">100</span>點</a>
                </li>
                <li class="dropdown">
                	<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> username <span class="caret"></span></a>
                	<ul class="dropdown-menu" role="menu">
		               	<li><a href="member.html">會員資料</a></li>
		               	<li><a href="mission.html">任務記錄</a></li>
		               	<li><a href="point.html">點數記錄</a></li>
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