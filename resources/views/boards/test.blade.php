<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>게시판</title>
</head>
<style>
    table, th, td {
        border: 1px solid black;
      }

</style>
<body>
    <a href="/boards/create">글쓰기</a>
    <table>
        <tr>
            <th>번호</th>
            <th>제목</th>
            <th>내용</th>
            <th>작성일</th>
        </tr>
        @foreach ($Boards as $item)
        <tr>
            <th>{{$item->bno}}</th>
            <th>{{$item->title}}</th>
            <th>{{$item->content}}</th>
            <th>{{$item->created_at}}</th>
        </tr>
        @endforeach
    </table>
</body>
</html>