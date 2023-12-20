<x-layout>
    <div class="container">
        <h2>Poster un avis pour {{ $histoire->titre }}</h2>
        <form action="{{ route('avis.store') }}" method="post">
            @csrf
            <input type="hidden" name="histoire_id" value="{{ $histoire->id }}">
            <input type="hidden" name="user_id" value="{{ auth()->id()}}">


            <div class="form-group">
                <label for="text">Commentaire :</label>
                <textarea name="contenu" id="contenu" rows="6" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Poster</button>
        </form>
    </div>
    </x-layout>

