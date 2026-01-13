@extends('layouts.app')

@section('content')
<h1>유저 추가</h1>

<form action="" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>유저아이디</label>
        <input type="text" name="user_id" value="">
    </div>

    <div>
        <label>이름</label>
        <input type="text" name="name" value="">
    </div>

    <button type="submit">수정</button>
</form>
@endsection
