@extends('layouts.app')

@section('title', '글수정')

@section('content')
    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ old('title', $post->title) }}" required autofocus>

        <textarea name="content" required>{{ old('content', $post->content) }}</textarea>

        <button type="submit">글 수정</button>
    </form>
@endsection
