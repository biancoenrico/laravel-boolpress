@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crea un nuovo post</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.posts.store') }}" method="post">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label for="content">Contenuto</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
            </div>

            <div class="form-group">
                <label for="">categoria</label>
                <select class="form-control" name="category_id" id="">

                    <option value="">Nessuna</option>

                    @foreach ( $categories as $item)
                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                    @endforeach
                </select>
            </div>

            <input type="submit" class="btn btn-success" value="Salva post">
        </form>
    </div>
@endsection 