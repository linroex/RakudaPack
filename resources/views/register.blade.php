<!DOCTYPE html>
<head>
    @include('part.header', ['title'=>'註冊'])
    <script>
        $(document).ready(function(){
            $.get("/schools", function(data){
                $.each(data.data, function(key, value){
                    $("select[name=school_id]").append("<option value="+ value.id +">" + value.name + "</option>");
                });
            });
            $("#submit").click(function(e){
                e.preventDefault();
                var params = $("form").serialize();
                $.post("/users/register" , params, function(data) {
                    if(data.code == 0){
                        $(".notify_block").html("");
                        $.each(data.data, function(i, item) {
                            $(".notify_block").append('<div class="alert alert-danger">' + item[0] + '</div>');
                        });
                    }else if(data.code == 1){
                        alert("註冊成功");
                        window.location = '{{url("/login")}}';
                    }

                });
            });
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
    
    <h2 class="col-md-offset-4 col-md-8">歡迎加入RakudaPack的行列！</h2>
    
        <div class="col-md-offset-4 col-md-4">
            <div class="notify_block">
                
            </div>
            <form role="form" class="">
                <div class="form-group">
                    <label for="realname">真實姓名</label>
                    <input type="text" name="name" class="form-control" id="realname" placeholder="Enter your real name">
                </div>
                <div class="form-group">
                    <label for="school">學校</label>
                    <select name="school_id" class="form-control">

                    </select>
                </div>
                <div class="form-group">
                    <label for="email">學校信箱（請務必輸入學校信箱，作為認證）</label>
                    <input type="email" name="mail" class="form-control" id="email" placeholder='Enter "school" email'>
                </div>
                <div class="form-group">
                    <label for="username">帳號</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username">
                </div>
                <div class="form-group">
                    <label for="pwd">密碼（請輸入8字內英文、數字）</label>
                    <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password">
                </div>
                <div class="form-group">
                    <label for="pwd2">再次輸入密碼</label>
                    <input type="password" name="password_confirmation" class="form-control" id="pwd2" placeholder="Enter password again">
                </div>
                <div class="form-group">        
                    <div class="col-sm-offset-3 col-sm-10">
                        <button id="submit" type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </div>
                </div>
            </form>
        </div>
        
</body>
</html>