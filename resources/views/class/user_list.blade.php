<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>학생 list</title>
</head>
<body>
    <h2>학생 list</h2>
    <table>
        <tr>
            <th>아이디</th>
            <th>사용자 코드</th>
            <th>이름</th>
            <th>학교</th>
            <th>등록일</th>
            <th>수업이름</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <th>{{$user->id}}</th>
            <th>{{$user->user_code}}</th>
            <th><a href="/get_class/{{$user->user_code}}">{{$user->name}}</a></th>
            <th>{{$user->school}}</th>
            <th>{{$user->join_date}}</th>
        </tr>
        @endforeach
    </table>
</body>
</html>