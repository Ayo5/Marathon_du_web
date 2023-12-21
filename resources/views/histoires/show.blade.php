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
                <p class="story-title"><strong>Titre : </strong>{{ $histoire->titre }}</p>
            </div>
            <div class="story-pic">
                {{-- la photo de l'histoire --}}
                <img src="{{ asset($histoire->photo) }}" alt="Image de l'histoire">
            </div>
            <div class="story-pitch">
                {{-- le pitch de l'histoire --}}
                <p><strong>Pitch : </strong><br/>{{ $histoire->pitch }}</p>
            </div>
            
            <div class="lecture-book">
                {{-- Bouton pour démarrer la lecture de l'histoire --}}

                <a href="{{ route('chapitre.premier', ['histoire' => $histoire->id]) }}" class="btn btn-primary histoires-link">Commencer la lecture</a>
            </div>

            <div  class="avis-histoires">
                {{-- Avis de l'histoire --}}
                <p><strong>Avis :</strong></p>
                @forelse($avis as $avisDeHistoire)
                    <p> {{$avisDeHistoire->user->name}} : {{ $avisDeHistoire->contenu }}</p>
                    @if(auth()->id() == $avisDeHistoire->user_id)
                        <div class="modif-com">
                            <form action="{{ route('avis.edit', ['id' => $avisDeHistoire->id]) }}" method="GET" style="display: inline;">
                                <button type="submit" class="btn btn-warning histoires-link">Modifier</button>
                            </form>
                            <form action="{{ route('avis.destroy', ['id' => $avisDeHistoire->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger histoires-link">Supprimer</button>
                            </form>
                        </div>
                    @endif
                @empty
                    <p>Aucun avis pour cette histoire.</p>
                @endforelse
            </div>
            <div class="lecture-book">
                {{-- Bouton pour créer un nouvel avis --}}
                <a href="{{ route('avis.create', ['id' => $histoire->id]) }}" class="btn btn-primary histoires-link">Poster un avis</a>
            </div>

            <div>
                {{-- Bouton pour démarrer la lecture de l'histoire --}}
                <a href="{{ route('chapitre.premier', ['histoire' => $histoire->id]) }}" class="btn btn-primary">Commencer la lecture</a>
            </div>

            <div>
                {{-- Bouton pour démarrer la lecture de l'histoire --}}
                <a href="{{ route('chapitre.create', ['histoireId' => $histoire->id]) }}" class="btn btn-primary">Ajouter un nouveau chapitre</a>
            </div>
        </div>
    @endif
</x-layout>
