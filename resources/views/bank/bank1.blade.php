<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>토큰발행</title>
</head>
<body>
    <form method="post" action="https://testapi.openbanking.or.kr/oauth/2.0/token" target="_blank">
        <input type="text" name="code"/>
        <input type="hidden" name="client_id" value="cf0c9afa-18f4-4f87-a024-3171ad75907f"/>
        <input type="hidden" name="client_secret" value="a58e954c-8eb3-4eef-9e66-2f9f3242aaae"/>
        <input type="hidden" name="redirect_uri" value="http://127.0.0.1:8000/bank/request"/>
        <input type="hidden" name="grant_type" value="authorization_code"/>
        <input type="submit" value="requestToken"/>
    </form>

</body>
</html>