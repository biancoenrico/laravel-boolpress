@extends('layouts.app')

@section('content')
    <div class="container">
            <h1>
                tag: {{ $tag->name }}
            </h1>
            <ul class="list-group">
                @foreach ($tag->posts as $item)
                <li class="list-group-item">
                    <a href="{{ route('blog-page', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                </li>
                @endforeach
            </ul>
    </div>
@endsection