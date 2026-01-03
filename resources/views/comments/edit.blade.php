@extends('layouts.app')

@section('content')
<h1>댓글 수정</h1>

<form action="" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>유저아이디</label>
        <input type="text" name="user_id" value="">
    </div>

    <div>
        <label>댓글내용</label>
        <input type="text" name="name" value="">
    </div>

    <button type="submit">수정</button>
</form>
@endsection
