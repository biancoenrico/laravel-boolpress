@extends('layouts.app')

@section('content')
    <div class="container">
        
            @if ($post->category)
                <div class="mt-2 mb-2">
                categoria: {{ $post->category['name'] }}
                </div>
            @endif
            
            <h1>{{ $post->title }}</h1>

            <div>
                <strong>
                    tag: 
                </strong>
                @foreach ( $post_tags as $item )
                    <a href="{{ route('tags-page', ['slug' => $item->slug]) }}">{{ $item->name }}, </a>
                @endforeach
            </div>

            <p>{{ $post->content }}</p>
    </div>
@endsection