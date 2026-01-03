@extends('layouts.app')

@section('content')
<h1>댓글 목록</h1>

<a href="{{ route('comments.create') }}">댓글 등록</a>

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>ID</th>
            <th>게시판 제목</th>
            <th>댓글내용</th>
            <th>관리</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>
            <form action="" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit">삭제</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>
@endsection
