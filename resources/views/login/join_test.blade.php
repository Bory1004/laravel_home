<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Member List</title>
</head>
<style>
    table{
        width: 800px;
    }

</style>
<body>
    <h2>학생 list</h2>
    <table>
        <tr>
            <th>이름</th>
            <th>학교</th>
            <th>수업이름</th>
            <th>사용자 코드</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <th><a href="/class/code={{$user->user_code}}">{{$user->name}}</a></th>
            <th>{{$user->school}}</th>
            <th>{{$user->class_name}}</th>
            <th>{{$user->user_code}}</th>
        </tr>
        @endforeach
    </table>

    <h2>수업 list</h2>
    <table>
        <tr>
            <th>수업코드</th>
            <th>수업이름</th>
            <th>강사</th>
            <th>시작일</th>
            <th>종료일</th>
            <th>수강료</th>
            <th>사용자 코드</th>
        </tr>
        @foreach ($classs as $class)
        <tr>
            <th>{{$class->class_code}}</a></th>
            <th>{{$class->class_name}}</a></th>
            <th>{{$class->teacher}}</a></th>
            <th>{{$class->begin_date}}</a></th>
            <th>{{$class->end_date}}</a></th>
            <th>{{$class->tuition}}</a></th>
            <th>{{$class->user_code}}</a></th>
        </tr>
        @endforeach
    </table>
   
    <script>

    </script>
</body>
</html>