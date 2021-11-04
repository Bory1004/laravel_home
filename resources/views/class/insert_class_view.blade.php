<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>수업등록</title>
</head>
<style>
    table{
        width: 800px;
    }

</style>
<body>
    <h2>수업 등록</h2>
    <form action="/insert_class" method="post">
        @csrf
        <input id="user_code" name="user_code" type="hidden" value="{{$user_code}}">
        <select name="class_code">
            @foreach ($classs as $class)
            <option value="{{$class->class_code}}">{{$class->class_name}}</option>
            @endforeach
        </select>
         <input type="submit" value="등록">
         <button id="add" type="button" onclick="bnt_click()">추가</button>
    </form>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function bnt_click(){
        let x = '{{$user_code}}';
        //let x = $("user_code").val();
        console.log("user_code : " + x);
    }
</script>
</html>