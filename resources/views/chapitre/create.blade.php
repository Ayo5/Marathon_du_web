<x-layout>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="contact-form">
        <form action="{{ route('chapitre.store', $histoire->id) }}" method="post">
            @csrf

            <label for="histoire_id">ID de l'Histoire</label>
            <input type="text" name="histoire_id" value="{{ $histoire->id }}" readonly>

            <label for="titre">Titre du Chapitre</label>
            <input type="text" name="titre" placeholder="titre du chapitre" required>

            <label for="titrecourt">Titre Court</label>
            <input type="text" name="titrecourt" placeholder="titre court du chapitre" required>

            <label for="texte">Contenu du Chapitre</label>
            <input type="text" name="texte" rows="5"  placeholder="Mettez votre texte ici" required>

            <label for="premier">Premier</label>
            <input type="checkbox" name="premier" value="1">

            <button type="submit">Créer le chapitre</button>
        </form>
    </div>
</x-layout>