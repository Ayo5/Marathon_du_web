<x-layout>
    <h1>Informations personnelles</h1>
    @if(!empty($users))
        <div class="divScene">
            @foreach($users as $user)
                @if($user->name == Auth::user()->name)
                    <div>
                        <p>Nom: {{$user->name}}</p>
                        <p>E-mail: {{$user->email}}</p>
                    </div>
                @endif
            @endforeach
        </div>
    @else
        <h3>Aucune informations personelles dans la table ...</h3>
    @endif
</x-layout>
