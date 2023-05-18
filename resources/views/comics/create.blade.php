@extends('layouts.app')

@section('page-title')
    Crea nuovo Fumetto
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('comics.store') }}">
        @csrf
        <div class="mb-3">
            <label for="thumb" class="form-label">Scegli Url Immagine:</label>
            <input type="text" class="form-control @error('thumb') is-invalid @enderror" id="thumb" name="thumb"
                value="{{ old('thumb') }}">
            @error('thumb')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Titolo:</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title') }}">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo:</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                value="{{ old('price') }}">
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="sale_date" class="form-label">Data Uscita:</label>
            <input type="text" class="form-control @error('sale_date') is-invalid @enderror" id="sale_date"
                name="sale_date" value="{{ old('sale_date') }}">
            @error('sale_date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="series" class="form-label">Serie:</label>
            <input type="text" class="form-control @error('series') is-invalid @enderror" id="series" name="series"
                value="{{ old('series') }}">
            @error('series')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione:</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                cols="30" rows="10">   
                {{ old('description') }}           
            </textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
@endsection
