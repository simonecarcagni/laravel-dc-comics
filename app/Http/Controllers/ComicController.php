<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreComicRequest;
use App\Http\Requests\UpdateComicRequest;



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
    public function store(StoreComicRequest $request)
    {

        $form_data = $this->validation($request->all());

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
        
        $form_data = $this->validation($request->all());
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


    private function validation($data){
        $validator = Validator::make(
            $data,
            [
                'title' => 'required|max:50',
                'description' => 'required|max:5000',
                'thumb' => 'required|max:255|url',
                'price' => 'required|max:50',
                'series' => 'required|max:50',
                'sale_date' => 'required|date',
            ],
            [
                'title.required' => 'Il titolo è richiesto.',
                'title.max' => 'Puoi inserire massimo 50 caratteri per il titolo.',
                'description.required' => 'La descrizione è richiesta.',
                'description.max' => 'Puoi inserire massimo 5000 caratteri per la descrizione.',
                'thumb.required' => 'URL è richiesto.',
                'thumb.max' => 'Puoi inserire massimo 255 caratteri per il campo URL.',
                'thumb.url' => 'Il dato inserito deve essere di tipo URL.',
                'price.required' => 'Il prezzo è richiesto.',
                'price.max' => 'Puoi inserire massimo 50 caratteri per il prezzo.',
                'series.required' => 'La serie è richiesta.',
                'series.max' => 'Puoi inserire massimo 50 caratteri per la serie.',
                'sale_date.required' => 'La data è richiesta.',
                'sale_date.date  ' => 'Il dato inserito deve essere di tipo DATE.'
            ]
        )->validate();

        return $validator;
    }
}
