@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>{{ $post->title }}</h2>
                <img src="https://source.unsplash.com/800x400?{{ $post->category->name }}"
                    class="img-fluid rounded-start my-4" alt="{{ $post->category->name }}">
                <p>by : <a href="/posts?author={{ $post->author->username }}"
                        class="text-decoration-none">{{ $post->author->name }}</a> in
                    <a href="/posts?category={{ $post->category->slug }}"
                        class="text-decoration-none">{{ $post->category->name }}</a>
                </p>
                <article class="my-3 fs-8">
                    {!! $post->body !!}
                </article>
                <a href="/blog" class="d-block mt-3">Back to posts</a>
            </div>
        </div>
    </div>
@endsection
