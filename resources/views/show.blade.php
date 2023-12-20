<x-layout>
    @if(empty($histoire))
        <h3>L'histoire' n'existe pas</h3>
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
                {{-- le pitch de l'histoire' --}}
                <p><strong>Pitch : </strong>{{ $histoire->pitch }}</p>
            </div>
            <div>
                {{-- la photo de l'histoire --}}
                <p><strong>Photo : </strong>{{ $histoire->photo }}</p>
            </div>
            <div>
                {{-- l'avis de l'histoire' --}}
                @foreach($avis as $avisDeHistoire)
                <p><strong>Avis :</strong>{{ $avisDeHistoire->contenu}}</p>
                @endforeach
            </div>
        </div>
    @endif
</x-layout>