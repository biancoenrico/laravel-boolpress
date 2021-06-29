@extends('layouts.app')

@section('content')
    <div class="container">
            <h1>tags</h1>
            <ul class="list-group">
                @foreach ( $tags as $item )
                    <li class="list-group-item">
                        <h5>{{ $item->name }}</h5>
                        <a href="{{ route('tags-page', ['slug' => $item->slug]) }}" class="btn btn-primary">vai al tag</a>
                    </li>
                @endforeach
            </ul>
    </div>
@endsection