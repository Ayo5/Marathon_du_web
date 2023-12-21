    @extends("templates.app")

    @section('content')
        <div style="text-align: center;">
            <div>
                <b>Le marathon du WEB 2023 !!!</b>
            </div>
        </div>

        <div class="welcome-login">
            @auth
                <h3>Bienvenue, {{Auth::user()->name}}</h3>
                <div class="logo-login">
                    <img src="{{url('storage/images/logo_reddrasil.png')}}" alt="Logo">
                    <h2 style="color: #66BB8D;">Read</h2><h2 style="color: #65B9BD;">drasil</h2>
                </div>
                <a href="{{route('histoires.create')}}" class="header-story">Nouvelle Histoire</a>
            @endauth
        </div>

        <form class="form selec-genre" action="{{ route('index') }}" method="get" style="text-align: center; margin-bottom: 20px;">
            <label for="cat">Sélectionner un genre :</label>
            <select name="cat" id="cat" onchange="this.form.submit()">
                <option value="All" @if($cat == 'All') selected @endif>-- Tous les Genres --</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre }}" @if($cat == $genre) selected @endif>{{ $genre }}</option>
                @endforeach
            </select>
        </form>

        <div class="choix-histoires">
            @foreach($histoires as $histoire)
                @if ($histoire->id %2 == 0)
                    <div class="histoires-total green">
                @else
                    <div class="histoires-total blue">
                @endif
                    <b>{{$histoire->titre}}</b>
                    <b id="pitch">{{$histoire->pitch}}</b>
                    <img src="{{ asset($histoire->photo) }}" alt="Image de l'histoire">
                    <a href="{{ route('histoires.show', ['id' => $histoire->id]) }}" class="histoires-link">Voir plus</a>
                </div>
            @endforeach
        </div>
    @endsection
