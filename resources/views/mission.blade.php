<!DOCTYPE html>
<html>
<head>
    @include('part.header', ['title'=>'任務記錄'])
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