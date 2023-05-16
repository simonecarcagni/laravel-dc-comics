@extends('layouts.app')

@section('page-title')
    Display Fumetto
@endsection

@section('content')
    <div class="card" style="width: 18rem;">
        <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{ $comic->title }}">
        <div class="card-body">
            <h5 class="card-title">{{ $comic->title }}</h5>
            <p class="card-text">{{ $comic->description }}</p>
            <h4>{{ $comic->series }}</h4>
            <h4>{{ $comic->price }}</h4>
            <h4>{{ $comic->sale_date }}</h4>
        </div>
        <a href="{{ route('comics.index') }}" class="btn btn-info">Torna alla lista</a>
    </div>
@endsection
