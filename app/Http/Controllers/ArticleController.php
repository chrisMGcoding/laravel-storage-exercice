<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::all();
        return view("pages.articles", compact("article"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("crud.articlecreate");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            "nom"=>["required"],
            "description"=>["required"],
            "auteur"=>["required"],
            "photo_profil"=>["required"]
        ]);

        $article = new Article;

        $article->nom = $request->nom;
        $article->description = $request->description;
        $article->auteur = $request->auteur;
        $article->photo_profil = $request->file("photo_profil")->hashName();

        $article ->save();

        $request->file("photo_profil")->storePublicly("img", "public");

        return redirect()->route("articles.index")->with('message', 'Article ajouté');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view("crud.articleshow", compact("article"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view("crud.articleedit", compact("article"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        request()->validate([
            "nom"=>["required"],
            "description"=>["required"],
            "auteur"=>["required"],
            "photo_profil"=>["required"]
        ]);

        Storage::disk("public")->delete("img/" . $article->photo_profil);

        $article->nom = $request->nom;
        $article->description = $request->description;
        $article->auteur = $request->auteur;
        $article->photo_profil = $request->file("photo_profil")->hashName();

        $article ->save();

        $request->file("photo_profil")->storePublicly("img", "public");

        return redirect()->route("articles.index")->with('message', 'Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        Storage::disk("public")->delete("img/" . $article->photo_profil);

        $article->delete();

        return redirect()->route("articles.index")->with('message', 'Article Supprimé');
    }
}
