<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>로그인</title>
</head>
<body>
    <form method="post" action ='login'>
        @csrf
        <div>
            <td>email<input type="text" class="form-control" name = 'email'/></td><br>
            <td>password<input type="password" class="form-control" name = 'password'/></td><br><br>
        </div>
        <button type="submit" class="alert alert-dark">로그인</button>
        <a href="create" class="alert alert-dark">회원가입</a>
        
    </form>
</body>
</html>