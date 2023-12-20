@extends('templates.app')

@section('content')
    <div class="container">
        <h2>Créer une nouvelle histoire</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



        <form method="POST" action="{{ route('histoires.store') }}">
            @csrf

            <div class="form-group">
                <label for="titre">Titre de l'histoire</label>
                <input type="text" name="titre" class="form-control" required value="{{old('titre')}}">
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="text" name="photo" class="form-control" required value="{{old('photo')}}">
            </div>
            <div class="form-group">
                <label for="pitch">Pitch de l'histoire</label>
                <textarea cols="30" rows="10" name="pitch" class="form-control" required></textarea>
            </div>
{{old('pitch')}}
            <div class="form-group">
                <label for="genre_id">Genre de l'histoire</label>
                <select name="genre_id" class="form-control" required>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="active">Activation de l'histoire</label>
                <input type="checkbox" name="active" class="form-check-input">
            </div>


            <button type="submit" class="btn btn-primary">Créer l'histoire</button>
        </form>
    </div>
@endsection
