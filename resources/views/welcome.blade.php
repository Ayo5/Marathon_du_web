    @extends("templates.app")

    @section('content')
        <div style="text-align: center;">
            <div>
                <b>Le marathon du WEB 2023 !!!</b>
            </div>
        </div>

        <form class="form" action="{{ route('index') }}" method="get" style="text-align: center; margin-bottom: 20px;">
            <label for="cat">Sélectionner un genre :</label>
            <select name="cat" id="cat" onchange="this.form.submit()">
                <option value="All" @if($cat == 'All') selected @endif>-- Touts les Genres --</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre }}" @if($cat == $genre) selected @endif>{{ $genre }}</option>
                @endforeach
            </select>
        </form>

        <table style="margin: auto; width: 50%;">
            <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($histoires as $histoire)
                <tr style="text-align: center;">
                    <td><b>{{$histoire->titre}}</b></td>
                    <td><b>{{$histoire->pitch}}</b></td>
                    <td><img src="{{ asset($histoire->photo) }}" alt="Image de l'histoire"></td>
                    <td><a href="{{ route('histoire.show', ['id' => $histoire->id]) }}">Voir</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @endsection
