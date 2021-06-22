@extends('layouts.app')

@section('main_content')
    <div class="container">
        <div class="row">
            @foreach ( $houses as $item )
                <div class="card" style="width: 18rem; margin:20px;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">{{ $item->description }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $item->meter_square }}</li>
                        <li class="list-group-item">{{ $item->rooms }}</li>
                        <li class="list-group-item">{{ $item->price }}</li>
                    </ul>
                    <div class="card-body" style="text-align:center;">
                        <a href="{{ route('houses.show',['house' => $item->id]) }}" class="card-link btn btn-primary">watch</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection