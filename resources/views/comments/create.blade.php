@extends('layouts.app')

@section('content')
<h1>댓글 등록</h1>

<form action="{{ route('comments.store') }}" method="POST">
    @csrf

    <div>
        <label>유저아이디</label>
        <input type="text" name="user_id">
    </div>

    <div>
        <label>댓글내용</label>
        <input type="text" name="name">
    </div>

    <button type="submit">저장</button>
</form>
@endsection
