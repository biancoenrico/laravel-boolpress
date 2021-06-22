@extends('layouts.app')

@section('main_content')
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="content">
                    <img src="" alt="">
                </div>
                <div class="content">
                    <h5 class="">{{ $house->title }}</h5>
                    <p class="">{{ $house->description }}</p>
                </div>
                <div class="content">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $house->meter_square }}</li>
                        <li class="list-group-item">{{ $house->rooms }}</li>
                        <li class="list-group-item">{{ $house->price }}</li>
                    </ul>
                </div>
                <div class="card-body" style="text-align:center;">
                        <a href="{{ route('houses.index') }}" class="card-link btn btn-outline-primary">return</a>
                        <a href="{{ route('houses.index') }}" class="card-link btn btn-success">buy</a>
                </div>
            </div>
        </div>
    </div>
@endsection