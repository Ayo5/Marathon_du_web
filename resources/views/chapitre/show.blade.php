<x-layout>
    @if(empty($chapitre))
        <h3>Le chapitre n'existe pas</h3>
    @else
        <div class="d-flex justify-content-center">
            <div class="text-center" style="margin-top: 2rem">
                <h3>Affichage du Chapitre</h3>
                <hr class="mt-2 mb-2">
            </div>
        </div>

        <div class="d-flex justify-content-center flex-column align-items-center">
            <div>
                {{-- le titre de l'histoire --}}
                <p><strong>Titre : </strong>{{ $chapitre->titre }}</p>
            </div>
            <div>
                <p><strong>Titre Court : </strong>{{ $chapitre->titrecourt }}</p>
            </div>
            <div>
                {{-- la photo de l'histoire --}}
                <p><strong>Media : </strong><img src="{{ asset($chapitre->media) }}" alt="Media du Chapitre"></td></p>
            </div>
        </div>
    @endif
</x-layout>