<x-layout>
    <div class="container">

        <form action="{{ route('avis.update', ['id' => $avis->id]) }}" method="post">
            {!! csrf_field() !!}
            @method('PUT')
            <div class="form-group form-com">
                <div class="photo">
                    <img src="{{url('storage/images/' . Auth::user()->avatar_link .'.png')}}">
                </div>
                <label for="text">Commentaire :</label>
                <textarea name="contenu" id="contenu" rows="6" class="form-control" required>{{ $avis->contenu }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary histoires-link">Modifier l'avis</button>
        </form>
    </div>
</x-layout>
