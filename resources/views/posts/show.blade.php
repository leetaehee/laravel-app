@extends('layouts.app')

@section('content')
<h1>글 상세</h1>

<p>이름: xxx</p>
<p>유저아이디: xxxx</p>
<p>제목: xxxx</p>
<p>내용: xxxxxxxxxxxxxxx</p>

<a href="{{ route('posts.index') }}">목록</a>
@endsection
