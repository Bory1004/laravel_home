@extends('layouts.master')

@section('title')
    Board Index
@endsection

@section('content')
    <p>Board Index</p>
    <a href="/boards/create">글쓰기</a>
    <table>
        <tr>
            <td>제목</td>
            <td>작성일</td>
        </tr>
        @foreach ($boards as $item)
        <tr>
            <td><a href="/boards/{{$item->id}}">{{$item->title}}</a></td>
            <td>{{$item->created_at}}</td>       
        </tr>
        @endforeach
    </table>

    <br>
    <form>
        <select name="searchn">
            <option value="0">전체</option>
            <option value="1">제목</option>
            <option value="2">내용</option>
        </select>
        <input type="text" name="search" id="search">
        <input type="submit" value="검색">
    </form>
@endsection