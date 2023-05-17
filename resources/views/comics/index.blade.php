@extends('layouts.app')

@section('page-title')
    Lista dei Fumetti
@endsection

@section('content')
    <a href="{{ route('comics.create') }}" class="btn btn-info">Crea</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Serie</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comics as $comic)
                <tr>
                    <th scope="row">{{ $comic->id }}</th>
                    <td>{{ $comic->title }}</td>
                    <td>{{ $comic->series }}</td>
                    <td>
                        <a type="button" class="btn btn-dark"
                            href="{{ route('comics.show', ['comic' => $comic->id]) }}">Vista</a>
                    </td>
                    <td>
                        <a type="button" class="btn btn-warning"
                            href="{{ route('comics.edit', ['comic' => $comic->id]) }}">Modifica</a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('comics.destroy', ['comic' => $comic->id]) }}">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Cancella</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
