@extends('layouts.main')

@section('container')
    <h1 class="text-center">{{ $title }}</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/posts">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-4">
                    <input type="text" class="form-control" placeholder="Search.." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-success" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4 mb-3">
                    <img src="https://source.unsplash.com/500x400?{{ $posts[0]->category->name }}"
                        class="img-fluid rounded-start" alt="{{ $posts[0]->category->name }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}"
                                class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
                        <p class="card-text">
                            <small class="text-muted">
                                <p>by : <a href="/posts?author={{ $posts[0]->author->username }}"
                                        class="text-decoration-none">{{ $posts[0]->author->name }}
                                    </a>
                                    in <a href="/posts?category={{ $posts[0]->category->slug }}"
                                        class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                                    {{ $posts[0]->created_at->diffForHumans() }}</p>
                            </small>
                        </p>
                        <p class="card-text">{{ $posts[0]->excerpt }}</p>
                        <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-success text-center">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0,0,0,0.7)">
                                <a href="/posts?category={{ $post->category->slug }}"
                                    class="text-decoration-none text-light">{{ $post->category->name }}</a>
                            </div>
                            <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top"
                                alt="{{ $post->category->name }}">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="/posts/{{ $post->slug }}" class="text-decoration-none">
                                        <p class="card-text">
                                            <small class="text-muted">
                                                <p>by : <a href="/posts?author={{ $post->author->username }}"
                                                        class="text-decoration-none">{{ $post->author->name }}
                                                    </a>

                                                    {{ $post->created_at->diffForHumans() }}</p>
                                            </small>
                                        </p>
                                    </a>
                                    <p class="text-truncate">
                                        <a href="/posts/{{ $post->slug }}"
                                            class="text-decoration-none text-dark">{{ $post->title }}</a>
                                    </p>
                                </h5>
                                <p class="card-text text-truncate" style="height: 40">{{ $post->excerpt }}
                                </p>
                                <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">No Post Found</p>
    @endif
    <div class="d-flex justify-content-center">

        {{ $posts->links() }}
    </div>

    {{-- @foreach ($posts->skip(1) as $post)
        <article class="mb-5 border-buttom pb-4">
            <h2>

                <a href="/posts/{{ $post->slug }}" class="text-decoration-none">
                    {{ $post['title'] }}
                </a>
            </h2>
            <p>by : <a href="/authors/{{ $post->author->username }}"
                    class="text-decoration-none">{{ $post->author->name }}
                </a>
                in <a href="/categories/{{ $post->category->slug }}"
                    class="text-decoration-none">{{ $post->category->name }}</a></p>
            <p>{{ $post->excerpt }}</p>
            <a href="/posts/{{ $post->slug }}" class="text-decoration-none">
                Read more..
            </a>
        </article>
    @endforeach --}}
@endsection