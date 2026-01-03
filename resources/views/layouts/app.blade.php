<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Laravel App')</title>
    <style>
        body { font-family: Arial; margin: 30px; }
        header a { margin-right: 10px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background: #f4f4f4; }
        form { display: inline; }
    </style>
</head>
<body>

<header>
    <a href="{{ route('users.index') }}">Users</a>
    <a href="{{ route('posts.index') }}">Posts</a>
    <a href="{{ route('comments.index') }}">Comments</a>
    <hr>
</header>

<main>
    @yield('content')
</main>

</body>
</html>
