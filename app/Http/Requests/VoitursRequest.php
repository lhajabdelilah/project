<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoitursRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|min:5|max:20',
            'CNI' => 'required',
            'Model' => 'required',
            'Marque' => 'required',
            'Couleur' => 'required',
            'Puissance' => 'required',
            'Categorie' => 'required',
            'Cous_par_jour' => 'required',
            'Image' => 'required'
        ];
    }
}
