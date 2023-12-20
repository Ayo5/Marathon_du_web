<x-layout>
    <div>
        <h3>Vous êtes connecté !</h3>
        <!--Ajouter btn pour avoir les infos utilisateurs-->
        <p>
            Vous pouvez retrouvez vos informations de base en cliquant
            sur le bouton ci-dessous:
        </p>
        <button><a href="{{route('user.index')}}">Information utilisateur</a></button>
    </div>
</x-layout>
