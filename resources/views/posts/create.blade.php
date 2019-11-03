@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">
        {{ isset($post) ? 'Edit Post' : 'Create Post' }}
    </div>
    <div class="card-body">
        @include('partials.errors')

        <form action="{{ isset($post) ? route('posts.update',$post->id): route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($post))
            @method('PUT')
            @endif
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ isset($post) ? $post->title:'' }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" cols="5" rows="5">{{ isset($post) ? $post->description:'' }}</textarea>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content:'' }}">
                <trix-editor input="content"></trix-editor>
            </div>

            <div class="form-group">
                <label for="published_at">Published at</label>
                <input type="text" class="form-control" id="published_at" name="published_at" value="{{ isset($post) ? $post->published_at:'' }}">
            </div>
            @if(isset($post))
            <div class="form-group">
                <img src="{{ asset('storage/'.$post->image) }}" alt="" style="width:100%">
            </div>
            @endif

            <div class="form-group">
                <label for="image">image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category" class="form-control">
                    <option value="">
                        @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if(isset($post)) @if($category->id === $post->category_id)
                        selected
                        @endif
                        @endif
                        >
                        {{$category->name}}
                    </option>
                    @endforeach
                    </option>
                </select>
            </div>
            @if($tags->count() > 0 )

            <div class="form-group">
                <label for="tags">Tags</label>
                <select name="tags[]" id="tags" class="form-control tags-selector" multiple>
                    @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" @if(isset($post)) @if( $post->hasTag($tag->id))
                        selected
                        @endif
                        @endif
                        >
                        {{ $tag->name }}
                    </option>
                    @endforeach
                </select>

            </div>
            @endif

            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ isset($post) ? 'Update post' : 'Create Post' }}
                </button>
            </div>
        </form>

    </div>
</div>
@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

<script>
    flatpickr('#published_at', {
        enableTime: true
    })

    $(document).ready(function() {
        $('.tags-selector').select2();
    });
</script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
@endsection