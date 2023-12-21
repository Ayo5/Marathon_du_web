<x-layout>
    @if(empty($histoire))
        <h3>L'histoire n'existe pas</h3>
    @else
        <div class="d-flex justify-content-center">
            <div class="text-center" style="margin-top: 2rem">
                <h3>Affichage d'une histoire</h3>
                <hr class="mt-2 mb-2">
            </div>
        </div>

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
                <p><strong>Photo : </strong>{{ $histoire->photo }}</p>
            </div>
            <div>
                {{-- Avis de l'histoire --}}
                <p><strong>Avis :</strong></p>
                @forelse($avis as $avisDeHistoire)
                    <p> {{$avisDeHistoire->user_id}} : {{ $avisDeHistoire->contenu }}</p>
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
            <div>
                {{-- Bouton pour créer un nouvel avis --}}
                <a href="{{ route('avis.create', ['id' => $histoire->id]) }}" class="btn btn-primary">Poster un avis</a>
            </div>

            <div>
                {{-- Bouton pour démarrer la lecture de l'histoire --}}

                <a href="{{ route('chapitre.premier', ['histoire' => $histoire->id]) }}" class="btn btn-primary">Commencer la lecture</a>
            </div>
        </div>
    @endif
</x-layout>
