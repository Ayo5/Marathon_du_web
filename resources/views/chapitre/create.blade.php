<x-layout>
    <form action="{{ route('chapitre.store', ['histoire' => $histoire->id]) }}" method="POST">
        @csrf
        <div>
            <label for="titre">Titre</label>
            <input type="text" id="titre" name="titre" required>
        </div>
        <div>
            <label for="titrecourt">Titre Court</label>
            <input type="text" id="titrecourt" name="titrecourt" required>
        </div>
        <div>
            <label for="media">Media</label>
            <input type="file" id="media" name="media" required>
        </div>
        <div>
            <input type="hidden" name="histoire_id" value="{{ $histoire->id }}">
        </div>
        <div>
            <button type="submit">Create Chapitre</button>
        </div>
    </form>
</x-layout>