@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->content }}</p>
        </div>
    </div>
@endsection