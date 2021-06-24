@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="margin-top:50px;">
            @foreach ( $posts as $item )
                <div class="col-4">
                    <div class="card" style="width: 18rem; margin-bottom:30px;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item['title'] }}</h5>
                            <p class="card-text">{{ $item['content'] }}</p>

                            <div>
                                <a href="{{ route('blog-page',['slug'=> $item->slug]) }}" class="btn btn-primary">Go somewhere</a>
                                <a href="{{ route('admin.posts.edit',['post'=> $item['id']]) }}" class="btn btn-success">modifica post</a>
                            </div>

                            <form style="text-align: center;margin-top:20px;" action="{{ route('admin.posts.destroy', ['post' => $item['id']]) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <input type="submit" class="btn btn-danger" value="elimina">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection