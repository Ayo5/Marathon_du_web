<x-layout>
    <div class="container">

        <form action="{{ route('avis.update', ['id' => $avis->id]) }}" method="post">
            {!! csrf_field() !!}
            @method('PUT')
            <div class="form-group">
                <label for="text">Commentaire :</label>
                <textarea name="contenu" id="contenu" rows="6" class="form-control" required>{{ $avis->contenu }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Modifier l'avis</button>
        </form>
    </div>
</x-layout>
