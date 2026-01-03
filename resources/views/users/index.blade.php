@extends('layouts.app')

@section('content')
<h1>유저 목록</h1>

<a href="{{ route('users.create') }}">유저 등록</a>

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>ID</th>
            <th>유저아이디</th>
            <th>이름</th>
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
