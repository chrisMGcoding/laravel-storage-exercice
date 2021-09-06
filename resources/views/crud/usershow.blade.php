@extends('template.template')

@section('content')

    <div class="container">

        <p>ID : {{ ($user->id) }}</p>
        <p>Name : {{ ($user->nom) }}</p>
        <p>Description : {{ ($user->description) }}</p>
        <p>Date de naissance : {{ ($user->date_naissance) }}</p>
        <p>Photo de profil : {{ ($user->photo_profil) }}</p>
        <p>Age : {{ ($user->age) }}</p>
        <p>Mot de Passe : {{ ($user->password) }}</p>

    </div>

@endsection