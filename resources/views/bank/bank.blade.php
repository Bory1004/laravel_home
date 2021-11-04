<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>오픈뱅킹</title>
</head>
<body>
    
    <form method="get" action="https://testapi.openbanking.or.kr/oauth/2.0/authorize" target="_blank">
        <input type="hidden" name="response_type" value="code"/>
        <input type="hidden" name="client_id" value="cf0c9afa-18f4-4f87-a024-3171ad75907f"/>
        <input type="hidden" name="redirect_uri" value="http://127.0.0.1:8000/bank/request"/>
        <input type="hidden" name="scope" value="login inquiry transfer"/>
        <input type="hidden" name="state" value="b80BLsfigm9OokPTjy03elbJqRHOfGSY"/>
        <input type="hidden" name="auth_type" value="0"/>
        <input type="submit" value="사용자 인증하기"/>
    </form>

</body>
</html>