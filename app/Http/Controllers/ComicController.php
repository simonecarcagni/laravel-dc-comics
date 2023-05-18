<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;


class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max=50',
            'description' => 'required|max=255',
            'thumb' => 'required|max=255',
            'price' => 'required|max=50',
            'series' => 'required|max=50',
            'sale_date' => 'required',
        ]);

        $form_data = $request->all();

        $newComic = new Comic();

        $newComic->fill($form_data);

        /*
        $newComic->title = $form_data['title'];
        $newComic->description = $form_data['description'];
        $newComic->thumb = $form_data['thumb'];
        $newComic->price = $form_data['price'];
        $newComic->series = $form_data['series'];
        $newComic->sale_date = $form_data['sale_date'];
        */

        $newComic->save();

        return redirect()->route('comics.show', ['comic'=>$newComic->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {;
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $request->validate([
            'title' => 'required|max=50',
            'description' => 'required|max=255',
            'thumb' => 'required|max=255',
            'price' => 'required|max=50',
            'series' => 'required|max=50',
            'sale_date' => 'required',
        ]);
        
        $form_data = $request->all();
        $comic->update($form_data);

        return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index');
    }
}
