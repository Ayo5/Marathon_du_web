{{-- resources/views/chapitre/showSuiteForm.blade.php --}}
<x-layout>
    <form method="post" action="{{ route('chapitre.storeSuite') }}">
        @csrf
        <input type="hidden" name="chapitre_source_id" value="{{ $chapitreSource->id }}">

        <label for="chapitre_destination_id">Chapitre cible :</label>
        <select name="chapitre_destination_id" required style="padding: 8px; width: 100%;">
            @foreach ($chapitresDisponibles as $chapitre)
                <option value="{{ $chapitre->id }}">{{ $chapitre->titrecourt }}</option>
            @endforeach
        </select>

        <label for="reponse">Réponse à la question :</label>
        <textarea name="reponse" required></textarea>

        <button type="submit">Lier les chapitres</button>
    </form>
</x-layout>
