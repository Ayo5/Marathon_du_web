@extends('templates.app')

@section('content')
    <h1>{{ $equipe['nomEquipe'] }}</h1>
    <img src="{{ asset($equipe['logo']) }}" alt="Logo de l'équipe">
    <h2>Membres de l'équipe</h2>
    <ul>
        @foreach($equipe['membres'] as $membre)
            <li>
                <img src="{{ asset('images/' . $membre['image']) }}" alt="{{ $membre['nom'] }}">
                <h3>{{ $membre['prenom'] }} {{ $membre['nom'] }}</h3>
                <p>Fonctions: {{ implode(', ', $membre['fonctions']) }}</p>
            </li>
        @endforeach
    </ul>
    <h3>Salle</h3>
    <p>
        {{ $equipe['localisation'] }}
    </p>
    <p>{{ $equipe['autres'] }}</p>
    <script src="{{ mix('js/app.js') }}"></script>
@endsection
