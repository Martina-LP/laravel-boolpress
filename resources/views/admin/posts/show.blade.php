@extends('layouts.dashboard')

@section('content')
    <section>
        <h1>{{ $post->title }}</h1>

        <div class="mb-2" style="font-weight: 600;">Slug: {{ $post->slug }}</div>

        <p>{{ $post->content }}</p>
    </section>

@endsection
