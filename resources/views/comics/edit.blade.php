@extends('layouts.app')

@section('page-title')
    Edita il tuo Fumetto
@endsection

@section('content')
    <form method="POST" action="{{ route('comics.update', ['comic' => $comic->id]) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="thumb" class="form-label">Scegli Url Immagine:</label>
            <input type="text" class="form-control" id="thumb" name="thumb" value="{{ $comic->thumb }}">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Titolo:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $comic->title }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo:</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ $comic->price }}">
        </div>
        <div class="mb-3">
            <label for="sale_date" class="form-label">Data Uscita:</label>
            <input type="text" class="form-control" id="sale_date" name="sale_date" value="{{ $comic->sale_date }}">
        </div>
        <div class="mb-3">
            <label for="series" class="form-label">Serie:</label>
            <input type="text" class="form-control" id="series" name="series" value="{{ $comic->series }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione:</label>
            <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{ $comic->description }}
            </textarea>
        </div>
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
@endsection
