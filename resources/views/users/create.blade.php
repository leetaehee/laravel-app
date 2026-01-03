@extends('layouts.app')

@section('content')
<h1>유저 등록</h1>

<form action="{{ route('users.store') }}" method="POST">
    @csrf

    <div>
        <label>유저아이디</label>
        <input type="text" name="user_id">
    </div>

    <div>
        <label>이름</label>
        <input type="text" name="name">
    </div>

    <button type="submit">저장</button>
</form>
@endsection
