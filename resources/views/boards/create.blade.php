@extends('layouts.master')

@section('title')
    Create Boards
@endsection

@section('content')
    <form action="/boards" method="POST">
        @csrf
        <label for="title">제목</label>
        <p><input type="text" name="title" id="title"></p>
        <p><label for="content">본문</label><p>
        <p><textarea name="content" id="content"cols="30" rows="10"></textarea></p>
        <input type="submit" value="작성">
    </form>
@endsection