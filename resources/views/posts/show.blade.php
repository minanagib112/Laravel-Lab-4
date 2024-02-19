@extends('layouts.main')

@section('title', 'Post Details')

@section('content')
    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-body">
                <h2 class="card-title mb-4">Post Details</h2>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Title:</th>
                            <td>{{ $post->title }}</td>
                        </tr>
                        <tr>
                            <th>Image:</th>
                            <td>
                                <img src="{{ Storage::url($post->image) }}" alt="Post Image" class="img-fluid rounded">
                            </td>
                        </tr>
                        <tr>
                            <th>Body:</th>
                            <td>{{ $post->body }}</td>
                        </tr>
                        <tr>
                            <th>Slug:</th>
                            <td>{{ $post->slug }}</td>
                        </tr>
                        <tr>
                            <th>Published At:</th>
                            <td>{{ $post->published_at }}</td>
                        </tr>
                        <tr>
                            <th>Created At:</th>
                            <td>{{ $post->created_at }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex">
                    @if (auth()->check() && $post->user_id == auth()->user()->id)
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary me-1">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @else
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary me-1">Like</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
