<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50',
            'description' => 'required|max:5000',
            'thumb' => 'required|max:255|url',
            'price' => 'required|max:50',
            'series' => 'required|max:50',
            'sale_date' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            
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
            
        ];
    }
}
