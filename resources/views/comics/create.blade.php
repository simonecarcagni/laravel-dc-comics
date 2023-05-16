@extends('layouts.app')

@section('page-title')
    Crea nuovo Fumetto
@endsection

@section('content')
    <form method="POST" action={{ route('comics.store') }}>
        @csrf
        <div class="mb-3">
            <label for="src" class="form-label">Scegli Url Immagine:</label>
            <input type="text" class="form-control" id="src" name="src">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Titolo:</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo:</label>
            <input type="text" class="form-control" id="price" name="price">
        </div>
        <div class="mb-3">
            <label for="sale" class="form-label">Data Uscita:</label>
            <input type="text" class="form-control" id="sale" name="sale">
        </div>
        <div class="mb-3">
            <label for="series" class="form-label">Serie:</label>
            <input type="text" class="form-control" id="series" name="series">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione:</label>
            <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
@endsection
