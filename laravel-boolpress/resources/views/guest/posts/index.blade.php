@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ( $posts as $item )
                <div class="col-4">
                    <div class="card mt-2 mb-2" style="width: 18rem;">
                        <div class="card-body mt-2 mb-2">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <a href="{{ route('blog-page', ['slug' => $item->slug]) }}" class="btn btn-primary">Leggi il post</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection