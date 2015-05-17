<!DOCTYPE html>
<html>
<head>
    @include('part.header', ['title'=>'會員資料'])
    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').focus()
        })
        $('#myModal2').on('shown.bs.modal', function () {
            $('#myInput').focus()
        })

        $(document).ready(function(){
            $.get('/users/data', {token: getCookie('token')}, function(response){
                if(response.code == 1) {
                    $("#user-name").text(response.data.name);
                    $("#user-school").text(response.data.school_name);
                    $("#user-mail").text(response.data.mail);
                    $("#user-username").text(response.data.username);
                }
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
                @include('part.navbar')
            </ul>
        </div>
    </div>
</nav>

   <div class="col-md-offset-2 col-md-8">

        <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">會員資料</h3>
                </div>
            <div class="panel-body">
                <br>
                <div class="col-md-offset-2 col-md-8">
              <table class="table">
                <tbody>
                  <tr>
                    <td><span class="glyphicon glyphicon-star" aria-hidden="true"></span> <span class="hidden-sm hidden-xs">姓名</span></td>
                    <td><div id="user-name"></div></td>
                  </tr>
                  <tr>
                    <td><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <span class="hidden-sm hidden-xs">學校</span></td>
                    <td><div id="user-school"></div></td>
                  </tr>
                  <tr>
                    <td><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> <span class="hidden-sm hidden-xs">學校信箱</span></td>
                    <td><div id="user-mail"></div></td>
                  </tr>
                  <tr>
                    <td><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <span class="hidden-sm hidden-xs">帳號</span></td>
                    <td><div id="user-username"></div></td>
                  </tr>
                  
                </tbody>
              </table>
            </div>
            </div>
        </div>
    </div>


</body>
</html>