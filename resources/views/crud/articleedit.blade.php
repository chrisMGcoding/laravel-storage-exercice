@extends('template.template')

@section('content')

    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('articles.update', $article->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")

        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input class="form-control" type="text" name="nom" value={{ $article->nom }}>
        </div>
        <div class="mb-3">
              <label class="form-label">Description</label>
              <input class="form-control" name="description" type="text" value={{ $article->description }}>
        <div class="mb-3">
              <label class="form-label">auteur</label>
              <input class="form-control" type="text" name="auteur" value={{ $article->auteur }}>
        </div>
        <div class="mb-3">
              <label class="form-label">Photo de profil</label>
              <input type="file" class="form-control" name="photo_profil" value={{ $article->photo_profil }}>
        </div>
        <button class="mt-2 mb-2" type="submit">Update</button>

        </form>

    </div>

@endsection
