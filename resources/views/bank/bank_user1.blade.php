
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>사용자 정보 조회하기</title>
</head>
<body>
    <h2>사용자 정보 조회</h2>
    <input type="button" id="bt" value="조회">
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $("#bt").click(function(){

        $.ajax({
        url:'https://testapi.openbanking.or.kr/v2.0/user/me',
        type : 'POST',
        headers : {
            'Authorization' : "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiIxMTAwOTk5NDYxIiwic2NvcGUiOlsiaW5xdWlyeSIsImxvZ2luIiwidHJhbnNmZXIiXSwiaXNzIjoiaHR0cHM6Ly93d3cub3BlbmJhbmtpbmcub3Iua3IiLCJleHAiOjE2NDI2NTk3MDUsImp0aSI6IjFkYWFiOWZlLTEzYjEtNGI1Mi04NjNmLWQyNTZjMDI3NzFmNiJ9.I5njg_7eaHUgC_F6pnDv-e7e8GWzxhfzKpqjh133se8"
        },
        data : {
            user_seq_no : '1100999461'
        },
        success:function(data){
            alert("성공!");
        }
        
    })
    });
</script>
</html>