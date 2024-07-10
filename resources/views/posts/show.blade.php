<!-- resources\views\posts\show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post Details</div>

                <div class="card-body">
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->content }}</p>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit Post</a>
                    <form method="POST" action="{{ route('posts.destroy', $post->id) }}" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
