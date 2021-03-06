@extends('layouts.dashboard')

@section('content')
    <section>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.posts.update', ['post' => $post->id] ) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}">
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select" name="category_id" id="category_id">
                    <option value="">None</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <h4>Tags</h4>

                @foreach ($tags as $tag)
                    <div class="form-check">
                        @if ($errors->any())
                            {{-- Se ci sono errori di validazione, decido se mettere checked o meno in base a old() --}}
                            <input {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }} class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag-{{ $tag->id }}">
                        @else
                            {{-- Se non ci sono errori di validazione, decido se mettere checked o meno in base a $post->tags->contains --}}
                            <input {{ $post->tags->contains($tag) ? 'checked' : '' }} class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag-{{ $tag->id }}">
                        @endif

                        <label class="form-check-label" for="tag-{{ $tag->id }}">
                        {{ $tag->name }}
                        </label>
                    </div>
                @endforeach
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ old('content', $post->content) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save edits</button>
        </form>
    </section>
@endsection
