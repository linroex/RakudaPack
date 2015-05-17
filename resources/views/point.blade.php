<!DOCTYPE html>
<html lang="en">
<head>
    
    @include('part.header', ['title'=>'點數記錄'])
    <link rel="stylesheet" href="{{url('jquery-ui.min.css')}}">
    <script src="{{url('jquery-ui.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#start_date').datepicker();
            $('#end_date').datepicker();

            $('#myModal').on('shown.bs.modal', function () {
                $('#myInput').focus()
            })

            $('#myModal2').on('shown.bs.modal', function () {
                $('#myInput').focus()
            })      
        });
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
                <h3 class="panel-title">點數記錄</h3>
            </div>
            <div class="panel-body">
                <div class="form-group col-md-offset-3 col-md-6">
                    <label for="range">轉出/轉入/不限</label>
                    <select name="range" class="form-control">
                        <option value="all" selected="true">不限</option>
                        <option value="trade_out">轉出</option>
                        <option value="trade_in">轉入</option>
                    </select>
                </div>
                <div class="input-daterange input-group col-md-offset-3 col-md-6"id="datepicker" name="datepicker">
                    <input type="text" class="input-sm form-control" name="start" id="start_date"/>
                    <span class="input-group-addon">to</span>
                    <input type="text" class="input-sm form-control" name="end" id="end_date"/>
                </div>
                <br>
                <table class="table">
                    <tr>
                      <th>日期</th>
                      <th>時間</th>       
                      <th>對象</th>
                      <th>事由</th>
                      <th>點數</th>
                      <th>結餘</th>
                    </tr>
                    <tr>
                      <td>Jill</td>
                      <td>Smith</td>        
                      <td>50</td>
                      <td>50</td>
                      <td>50</td>
                      <td>50</td>
                    </tr>
                    <tr>
                      <td>50</td>
                      <td>Eve</td>
                      <td>Jackson</td>      
                      <td>Jackson</td>      
                      <td>Jackson</td>      
                      <td>94</td>
                    </tr>
                </table>    
            </div>
            
        </div>
    </div>


    
</body>
</html>