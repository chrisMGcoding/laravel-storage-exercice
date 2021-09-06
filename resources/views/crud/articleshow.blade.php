@extends('template.template')

@section('content')

    <div class="container">

        <p>ID : {{ ($article->id) }}</p>
        <p>Name : {{ ($article->nom) }}</p>
        <p>Description : {{ ($article->description) }}</p>
        <p>Auteur : {{ ($article->auteur) }}</p>
        <p>Photo de profil : {{ ($article->photo_profil) }}</p>

    </div>

@endsection