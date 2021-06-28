@extends('layouts.app')

@section('content')
    <div class="container">
            <h1>categorie</h1>
            @foreach ( $categories as $item )
                <div class="col-4">
                    <div class="card mt-2 mb-2" style="width: 18rem;">
                        <div class="card-body mt-2 mb-2" style="text-align:center">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <a href="{{ route('category-page', ['slug' => $item->slug]) }}" class="btn btn-primary">vai alla categoria</a>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
@endsection
