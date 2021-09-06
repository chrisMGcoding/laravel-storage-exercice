@extends('template.template')

@section('content')

<div class="container d-flex justify-content-center">

    <h1>Articles</h1>
    <button class="m-2 rounded bg-primary">
        <a href="{{ route('articles.create') }}"><p class="text-dark text-decoration-none">Ajouter</p></a>
    </button>

</div>

<div class="container">

    <table class="table">

        <thead >
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                <th scope="col">Auteur</th>
                <th scope="col">Photo de profil</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>

        <tbody>

        @foreach($article as $item)

            <tr>
                <th scope="row">{{ ($item->id) }}</th>
                <td>{{ ($item->nom) }}</td>
                <td>{{ ($item->description) }}</td>
                <td>{{ ($item->auteur) }}</td>
                <td><img style="width: 40px" src="{{ asset('img/' . $item->photo_profil) }}" alt=""></td>
                <td>
                    <div class="d-flex">
                        <form action="{{ route('articles.destroy', $item->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="rounded m-3 bg-danger" type="submit">Delete</button>
                        </form>

                        <button class="rounded m-3 bg-warning"><a class="text-decoration-none text-dark" href="{{ route('articles.show', $item->id)}}">Show</a></button>

                        <button class="rounded m-3 bg-success"><a class="text-decoration-none text-dark" href="{{ route('articles.edit', $item->id)}}">Update</a></button>
                    </div>
                </td>
            </tr>

        @endforeach

        </tbody>

    </table>

    </div>

@endsection