@extends('layouts.app')

@section('content')
<h1>댓글 상세</h1>

<p>유저아이디: xxxx</p>
<p>댓글: xxxx</p>

<a href="{{ route('comments.index') }}">목록</a>
@endsection
