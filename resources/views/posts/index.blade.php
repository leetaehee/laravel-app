@extends('layouts.app')

@section('content')
<h1>글 목록</h1>

<a href="{{ route('posts.create') }}">글 등록</a>

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>ID</th>
            <th>제목</th>
            <th>작성자</th>
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
                    <button type="submit">수정</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>
@endsection
