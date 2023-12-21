<x-layout>
    <h1>Informations personnelles</h1>
    @if(!empty($user))
        <div class="divScene">

                <div>
                    <div class="intro-profile">
                        <img src="{{url('storage/images/'.$user->avatar_link.'.png')}}">
                        <div>
                            <p>Nom: {{$user->name}}</p>
                            <p>E-mail: {{$user->email}}</p>
                        </div>
                    </div>
                    <p>Nombre d'œuvres lues: {{$nombreOeuvresTerminees}}</p>
                    <div class= "choix-histoires">
                        @foreach($terminees as $t)
                            <div class= "histoires-total blue">
                                <p class="titre">{{$t->titre}}</p>
                                <p class="pitch">{{$t->pitch}}</p>
                                <img src="{{$t->photo}}" class="photo">
                            </div>
                        @endforeach
                    </div>
                    @foreach($avis as $avi)
                        @foreach($oeuvres as $oeuvre)
                            @if($oeuvre->id == $avi->histoire_id)
                                <div class="avis-profile">
                                    <p class= "avis-titre">Avis sur l'œuvre {{$oeuvre->titre}}:</p>
                                    <p>{{$avi->contenu}}</p>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>

        </div>
    @else
        <h3>Aucune informations personnelles dans la table ...</h3>
    @endif
</x-layout>
