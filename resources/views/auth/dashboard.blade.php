<x-layout>
    <div>
        <h3>Vous êtes connecté !</h3>
        <!--Ajouter btn pour avoir les infos utilisateurs-->
        <p style="margin-bottom: 30px";>
            Vous pouvez retrouvez vos informations de base en cliquant
            sur le bouton ci-dessous:
        </p>

            <a href="{{ route('user.index', ['idCurr' => Auth::user()->id]) }}" class="bouton-profile">
                Information utilisateur
            </a>
    </div>
</x-layout>
