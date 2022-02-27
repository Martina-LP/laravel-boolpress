@extends('layouts.dashboard')

@section('content')
    <h2>Write a new Post</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.posts.store') }}" method="post">
        @csrf
        @method('POST')

        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" cols="30" rows="10" id="content" name="content">{{ old('content') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
@endsection
