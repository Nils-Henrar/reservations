<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = Artist::all();

        return view('artist.index', [
            'artists' => $artists,
            'resource' => 'artistes',
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * 
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $artist = Artist::find($id);

        return view('artist.show', [
            'artist' => $artist,
        ]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        //
        $artist = Artist::find($id);

        return view('artist.edit', [
            'artist' => $artist,
        ]);
    }
    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'firstname' => 'required|max:30',
            'lastname' => 'required|max:30',
        ]);

        // Le formulaire est valide, nous récupérons l'artiste à modifier
        $artist = Artist::find($id);



        // Mise à jour des données modifiées et sauvegarde dans la base de données
        $artist->update($validated);



        return view('artist.show', [
            'artist' => $artist,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        //
    }
}
