@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>My Posts</h1>

        <div class="row row-cols-3">
            @foreach ($posts as $post)
            <div class="col">
                <div class="card mt-2">
                    @if ($post->cover)
                        <img src="{{ asset('storage/' . $post->cover) }}" class="card-img-top" alt="{{ $post->title }}">
                    @endif
                    <div class="card-body">
                      <h5 class="card-title">{{ $post->title }}</h5>
                      <p class="card-text">{{ Str::substr($post->content, 0, 80) }} ...</p>
                      <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="btn btn-primary">Read more</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
@endsection
