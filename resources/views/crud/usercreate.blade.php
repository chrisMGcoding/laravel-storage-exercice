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

    <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="mb-3">
          <label class="form-label">Nom</label>
          <input class="form-control" type="text" name="nom" value="{{ old('nom') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">email</label>
            <input type="text" class="form-control" type="text" name="email" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">password</label>
            <input type="text" class="form-control" type="text" name="password" value="{{ old('password') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">date de naissance</label>
            <textarea class="form-control" name="date_naissance" value="{{ old('date_naissance') }}"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Photo de profil</label>
            <input type="file" class="form-control" type="text" name="photo_profil" value="{{ old('photo_profil') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">description</label>
            <input type="text" class="form-control" type="text" name="description" value="{{ old('description') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">age</label>
            <input type="text" class="form-control" type="text" name="age" value="{{ old('age') }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

</div>

@endsection