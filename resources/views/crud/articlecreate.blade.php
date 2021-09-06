@extends('template.template')

@section('content')

<div class="container">

    <h1 class="text-center my-3">Créer Article</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="mb-3">
          <label class="form-label">Nom</label>
          <input class="form-control" type="text" name="nom" value="{{ old('nom') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" value="{{ old('description') }}"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">auteur</label>
            <input type="text" class="form-control" type="text" name="auteur" value="{{ old('auteur') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Photo de profil</label>
            <input type="file" class="form-control" type="text" name="photo_profil" value="{{ old('photo_profil') }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

</div>

@endsection