@extends('layouts.master')

@section('title')
    Show Board
@endsection

@section('content')
    <p>Show Board</p>
    <p>제목 : {{$board -> title}}</p>
    <p>내용 : {{$board -> content}}</p>
    <a href="/boards/{{$board->id}}/edit"><button>수정</button></a>
    <form style="display:inline;" action="/boards/{{$board->id}}" method="POST">
        @csrf
        @method('DELETE')
    <button>삭제</button>
    </form>
    <br><br>
    <a href="/boards">목록으로</a>
@endsection