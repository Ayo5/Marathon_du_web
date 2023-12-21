@extends('templates.app')

@section('content')
    <div class="container">
        <h2>{{ $histoire->titre }}</h2>
        <img src="{{ $histoire->photo }}" alt="Photo de l'histoire">
        <p>{{ $histoire->pitch }}</p>
        <a href="{{ route('histoires.show', ['id' => $histoire->id]) }}">Retour à la page de l'histoire</a>
    </div>
@endsection
