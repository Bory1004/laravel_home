<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>회원가입</title>
</head>
<body>
    <form method="post" action ='create'>
        @csrf
        <div>
        <td> name
        <input type="text" class="form-control" name = 'name'/>
        </td><br>
        <td> email
        <input type="text" class="form-control" name = 'email'/>
        </td><br>
        <td>
        password
        <input type="password" class="form-control" name = 'password'/> </td><br>
        <br> </div>
        <button type="submit" class="alert alert-dark">회원가입</button>
    </form>
</body>
</html>