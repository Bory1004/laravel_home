<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>수업</title>
</head>
<style>
    table{
        width: 800px;
    }

</style>
<body>

    <h2>{{$users}}의 수업 list</h2>
    <table>
        <tr>
            <th>수업코드</th>
            <th>수업이름</th>
            <th>강사</th>
            <th>수강료</th>
            <th>시작일</th>
            <th>종료일</th>
            <th>시간</th>
            <th>관리</th>
        </tr>      
        @foreach ($classs as $class)   
        <tr>  
            <th>{{$class->class_code}}</a></th>
            <th>{{$class->class_name}}</a></th>
            <th>{{$class->teacher}}</a></th>
            <th>{{$class->tuition}}</a></th>
            <th>{{$class->begin_date}}</a></th>
            <th>{{$class->end_date}}</a></th>
            <th>{{$class->class_time}}</a></th>
            <th><a href="/delete_class/{{$class->class_code}}/{{$user_code}}">삭제</a></th>
        </tr>
        @endforeach
    </table>
</body>
</html>