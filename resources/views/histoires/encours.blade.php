@extends('templates.app')

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

    <!-- Affichage du résumé de l'histoire avec les chapitres -->
    <div class="d-flex justify-content-center flex-column align-items-center">
        <div>
            {{-- le titre de l'histoire --}}
            <p><strong>Titre : </strong>{{ $histoire->titre }}</p>
        </div>
        <div>
            {{-- le pitch de l'histoire --}}
            <p><strong>Pitch : </strong>{{ $histoire->pitch }}</p>
        </div>
        <div>
            {{-- la photo de l'histoire --}}
            <p><strong>Photo : </strong><img src="{{ asset($histoire->photo) }}" alt="Image de l'histoire"> </p>
        </div>
        <div>
            {{-- Avis de l'histoire --}}
            <p><strong>Avis :</strong></p>
            @forelse($avis as $avisDeHistoire)
                <p> {{$avisDeHistoire->user->name}} : {{ $avisDeHistoire->contenu }}</p>
                @if(auth()->id() == $avisDeHistoire->user_id)
                    <form action="{{ route('avis.edit', ['id' => $avisDeHistoire->id]) }}" method="GET" style="display: inline;">
                        <button type="submit" class="btn btn-warning">Modifier</button>
                    </form>
                    <form action="{{ route('avis.destroy', ['id' => $avisDeHistoire->id]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                @endif
            @empty
                <p>Aucun avis pour cette histoire.</p>
            @endforelse
        </div>

        <!-- Affichage des chapitres -->
        <div>
            <h3>Chapitres de l'histoire</h3>
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre Court</th>
                    <th>Question</th>
                </tr>
                </thead>
                <tbody>
                @foreach($histoire->chapitres as $chapitre)
                    <tr>
                        <td>{{ $chapitre->id }}</td>
                        <td>{{ $chapitre->titrecourt }}</td>
                        <td>{{ $chapitre->question }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Formulaire pour créer un avis -->
        <form action="{{ route('avis.create', ['id' => $histoire->id]) }}" method="GET">
            <button type="submit" class="btn btn-primary">Poster un avis</button>
        </form>

        <!-- Formulaire pour créer un nouveau chapitre -->
        <form action="{{ route('chapitre.create', ['histoireId' => $histoire->id]) }}" method="GET">
            <button type="submit" class="btn btn-primary">Ajouter un nouveau chapitre</button>
        </form>

        <!-- Formulaire pour créer une liasons -->
        <form action="{{ route('chapitre.showSuiteForm' ) }}" method="GET">
            <button type="submit" class="btn btn-primary">Créer une liason</button>
        </form>

@endsection