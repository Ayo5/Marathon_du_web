@extends('templates.app')

@section('content')
    <div class="equipe">
        <h1>{{ $equipe['nomEquipe'] }}</h1>
        <img src="{{ asset($equipe['logo']) }}" alt="Logo de l'équipe">
        <h2>Membres de l'équipe</h2>
        <div class="grid-equipe">
            @foreach($equipe['membres'] as $membre)
                    <div class="equipe-membre">
                        <img src="{{ asset('images/' . $membre['image']) }}" alt="{{ $membre['nom'] }}">
                        <h3>{{ $membre['prenom'] }} {{ $membre['nom'] }}</h3>
                        <p>Fonctions: {{ implode(', ', $membre['fonctions']) }}</p>
                    </div>
            @endforeach
        </div>
        <h3>Salle</h3>
        <p>
            {{ $equipe['localisation'] }}
        </p>
        <p>{{ $equipe['autres'] }}</p>
        <script src="{{ mix('js/app.js') }}"></script>
    </div>
@endsection
