@extends('layouts.app')

@section('content')
    <div class="container">
            <h1>categoria: {{ $category->name }}</h1>

            <ul>
                @foreach ($posts as $item)
                    <li class="card mt-2 mb-2">
                        <a href="{{ route('blog-page', ['slug' => $item->slug]) }}" class="card-body mt-2 mb-2">{{ $item->title }}</a>
                    </li>
                @endforeach
            </ul>
    </div>
@endsection
