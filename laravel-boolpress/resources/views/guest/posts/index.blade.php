@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ( $posts as $item )
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <a href="{{ route('blog-page', ['slug' => $item->slug]) }}" class="btn btn-primary">Leggi il post</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection