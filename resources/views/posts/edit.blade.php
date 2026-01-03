@extends('layouts.app')

@section('content')
<h1>글 수정</h1>

<form action="" method="POST">
    @csrf
    @method('PUT')

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

    <button type="submit">수정</button>
</form>
@endsection
