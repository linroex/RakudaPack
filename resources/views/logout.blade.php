<!DOCTYPE html>
<html lang="en">
<head>
    @include('part.header', ['title'=>'登出'])
    <script>
    $(document).ready(function(){
        
        $.get('{{url("users/logout")}}', {token: getCookie('token')}, function(response){
            
        })
        document.cookie = "token=;";
        window.location = "{{url('/login')}}";
    })
    </script>
</head>
<body>
    
</body>
</html>