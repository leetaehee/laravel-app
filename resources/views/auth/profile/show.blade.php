@extends('layouts.app')

@section('title', '마이페이지')

@section('content')
    <form action="{{ route('profile.edit') }}" method="GET">
        <input type="text" name="name" value="{{ old('name', $user->name) }}" readonly disabled>

        <input type="text" name="email" value="{{ old('name', $user->email) }}" readonly disabled>

        <button type="submit">개인정보 변경하기</button>
    </form>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">로그아웃</button>
    </form>
@endsection
