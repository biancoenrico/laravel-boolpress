@extends('layouts.app')

@section('content')
    <div class="container">
            <h1 class="mt-2 mb-2">{{ $post->title }}</h1>
            <p class="mt-2 mb-2">
                <strong>
                    slug:
                </strong>
                {{ $post->slug }}
            </p>
            @if ($post->category)
                <div class="mt-2 mb-2">
                    <strong>categoria:</strong> {{ $post->category->name }}
                </div>
            @endif
            
            <div>
                <strong>
                    tag: 
                </strong>
                @foreach ( $post_tags as $item )
                    <a href="">{{ $item->name }},</a>
                @endforeach
            </div>

            <p>{{ $post->content }}</p>
    </div>
@endsection