@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-8">
                <h2>{{ $post->title }}</h2>
                <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span>Back to all my
                    posts</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-success"><span
                        data-feather="edit"></span>Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span
                            data-feather="x-circle"></span>Delete</button>
                </form>
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded-start mt-3">
                @else
                    <img src="https://source.unsplash.com/800x400?{{ $post->category->name }}"
                        class="img-fluid rounded-start mt-3" alt="{{ $post->category->name }}">
                @endif
                <article class="my-3 fs-8">
                    {!! $post->body !!}
                </article>
                <a href="/dashboard/posts" class="d-block mt-3">Back to posts</a>
            </div>
        </div>
    </div>
@endsection
