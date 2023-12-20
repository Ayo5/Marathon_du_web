<x-layout>
    <h1>Informations personnelles</h1>
    @if(!empty($user))
        <div class="divScene">

                <div>
                    <img src="{{url('storage/images/'.$user->avatar_link.'.png')}}">
                    <p>Nom: {{$user->name}}</p>
                    <p>E-mail: {{$user->email}}</p>
                    <p>Nombre d'œuvres lues: {{$nombreOeuvresTerminees}}</p>
                    @foreach($terminees as $t)
                        <p class="titre">{{$t->titre}}</p>
                        <p class="pitch">{{$t->pitch}}</p>
                        <p class="photo">{{$t->photo}}</p>
                    @endforeach
                    @foreach($avis as $avi)
                        @foreach($oeuvres as $oeuvre)
                            @if($oeuvre->id == $avi->histoire_id)
                                <p>Avis sur l'œuvre {{$oeuvre->titre}}:</p>
                                <p>{{$avi->contenu}}</p>
                            @endif
                        @endforeach
                    @endforeach
                </div>

        </div>
    @else
        <h3>Aucune informations personnelles dans la table ...</h3>
    @endif
</x-layout>
