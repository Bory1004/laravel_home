<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>사용자 정보 조회</title>
</head>
<body>
    
    <form method="get" action="https://testapi.openbanking.or.kr/2.0/user/me" target="_blank">
        <input type="text" name="Authorization"/>
        <input type="text" name="user_seq_no"/>
        <input type="submit" value="request"/>
    </form>

</body>
</html>