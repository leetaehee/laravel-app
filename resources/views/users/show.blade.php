@extends('layouts.app')

@section('content')
<h1>유저 상세</h1>

<p>유저아이디: xxxx</p>
<p>이름: xxxx</p>

<a href="{{ route('users.index') }}">목록</a>
@endsection
