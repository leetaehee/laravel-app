@extends('layouts.app')

@section('content')
<h1>글 등록</h1>

<form action="{{ route('posts.store') }}" method="POST">
    @csrf

    <div>
        <label>제목</label>
        <input type="text" name="name">
    </div>

    <div>
        <label>유저아이디</label>
        <input type="text" name="user_id">
    </div>

    <div>
        <label>내용</label>
        <input type="text" name="name">
    </div>

    <button type="submit">저장</button>
</form>
@endsection
