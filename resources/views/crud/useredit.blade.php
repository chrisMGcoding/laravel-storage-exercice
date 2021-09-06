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

        <form action="{{ route('users.update', $user->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")

        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input class="form-control" type="text" name="nom" value="{{ $user->nom }}">
          </div>
          <div class="mb-3">
              <label class="form-label">email</label>
              <input type="text" class="form-control" type="text" name="email" value="{{ $user->email }}">
          </div>
          <div class="mb-3">
              <label class="form-label">password</label>
              <input type="text" class="form-control" type="text" name="password" value="{{ $user->password }}">
          </div>
          <div class="mb-3">
              <label class="form-label">date de naissance</label>
              <textarea class="form-control" name="date_naissance" value="{{ $user->date_naissance }}"></textarea>
          </div>
          <div class="mb-3">
              <label class="form-label">Photo de profil</label>
              <input type="file" class="form-control" type="text" name="photo_profil" value="{{ $user->photo_profil }}">
          </div>
          <div class="mb-3">
              <label class="form-label">description</label>
              <input type="text" class="form-control" type="text" name="description" value="{{ $user->description }}">
          </div>
          <div class="mb-3">
              <label class="form-label">age</label>
              <input type="text" class="form-control" type="text" name="age" value="{{ $user->age }}">
          </div>
        <button class="mt-2 mb-2" type="submit">Update</button>

        </form>

    </div>

@endsection
