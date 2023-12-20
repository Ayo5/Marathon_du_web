@extends("templates.app")

@section('content')
    <div style="text-align: center;">
        <div>
            <b>Le marathon du WEB 2023 !!!</b>
        </div>
    </div>

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
                <td><b>{{$histoire->description}}</b></td>
                <td><b>{{$histoire->date}}</b></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
