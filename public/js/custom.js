function getCookie($key) {
    return document.cookie.split(";")[0].split("=")[1];
}

$(document).ready(function(){
    $.get('/users/data', {token: getCookie('token')}, function(response){
        // console.log(response.data);
        $('.username').text(response.data.name);
    });
})