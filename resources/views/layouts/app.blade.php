<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Personal Blog</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: skyblue;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Welcome to My Personal Blog</h1>
        <p>Description: Here you can post, update, edit, and delete the Posts.</p>
        <div class="mb-4">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">New Post</a>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">All Posts</a>
        </div>
        
        @yield('content')
    </div>
</body>
</html>
