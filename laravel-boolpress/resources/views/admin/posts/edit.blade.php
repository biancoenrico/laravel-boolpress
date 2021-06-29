@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifica post: {{ $post->title }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}">
            </div>

            <div class="form-group">
                <label for="content">Contenuto</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ old('content', $post->content) }}</textarea>
            </div>

            <div class="form-group">
                <label for="">categoria</label>
                <select class="form-control" name="category_id" id="category_id">

                    <option value="">Nessuna</option>

                    @foreach ( $categories as $item)
                        <option value="{{ $item->id }}" {{ (old('category_id', $post->category_id == $item->id) ? 'selected' : '') }}>{{ $item['name'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-3 ">
            <h4>tags:</h4>
                @foreach ($tags as $tag)
                    <div class="form-check mt-3 mr-3 d-inline">
                        <input class="form-check-input " name="tags[]" type="checkbox" value="{{ $tag->id }}" id="tag-{{ $tag->id }}" >
                        <label class="form-check-label" for="tag-{{ $tag->id }}">
                            {{ $tag->name }}
                        </label>
                    </div>
                @endforeach
            </div>

            <input type="submit" class="btn btn-success" value="Salva le modifiche">
        </form>
    </div>
@endsection