<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalendarRequest extends FormRequest
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
            'nom' => 'required',
            'link1' => 'required|url',
            'link2' => 'required|url',
        ];
    }

    public function messages()
    {
        return [
          'nom.required' => 'Un nom est requis !',
          'link1.required' => 'Un lien de calendrier est requis !',
          'link2.required' => 'Un lien de calendrier est requis !',
        ];
    }
}
