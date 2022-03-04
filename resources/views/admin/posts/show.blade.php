@extends('layouts.dashboard')

@section('content')
    <section>
        <h1>{{ $post->title }}</h1>

        <div class="mb-2" style="font-weight: 600;">Slug: {{ $post->slug }}</div>

        <div class="mb-2"><strong>Category:</strong> {{ $post->category ? $post->category->name : 'none' }}</div>

        <div class="mb-2"><strong>Tags:</strong>
            @forelse ($post->tags as $tag)
                {{ $tag->name }}{{ $loop->last ? '' : ', ' }}
            @empty
                none
            @endforelse
        </div>

        <p>{{ $post->content }}</p>

        <div>
            <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">Edit Post</a>
        </div>
        <div>
            <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger">Remove Post</button>
            </form>
        </div>
    </section>

@endsection
