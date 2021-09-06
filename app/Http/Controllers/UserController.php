<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view("pages.users", compact("user"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("crud.usercreate");
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
            "email"=>["required"],
            "photo_profil"=>["required"],
            "password"=>["required"],
            "age"=>["required"],
            "date_naissance"=>["required"],
        ]);

        $user = new User;

        $user->nom = $request->nom;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->date_naissance = $request->date_naissance;
        $user->photo_profil = $request->file("photo_profil")->hashName();
        $user->description = $request->description;
        $user->age = $request->age;

        $user ->save();

        $request->file("photo_profil")->storePublicly("img", "public");

        return redirect()->route("users.index")->with('message', 'On est bons');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view("crud.usershow", compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("crud.useredit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate([
            "nom"=>["required"],
            "description"=>["required"],
            "email"=>["required"],
            "photo_profil"=>["required"],
            "password"=>["required"],
            "age"=>["required"],
            "date_naissance"=>["required"],
        ]);

        Storage::disk("public")->delete("img/" . $user->photo_profil);

        $user->nom = $request->nom;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->date_naissance = $request->date_naissance;
        $user->photo_profil = $request->file("photo_profil")->hashName();
        $user->description = $request->description;
        $user->age = $request->age;

        $user ->save();

        $request->file("photo_profil")->storePublicly("img", "public");

        return redirect()->route("users.index")->with('message', 'Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Storage::disk("public")->delete("img/" . $user->photo_profil);

        $user->delete();

        return redirect()->route("users.index")->with('message', 'Supprimé');
    }
}
