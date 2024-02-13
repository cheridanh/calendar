<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalendarFormRequest extends FormRequest
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
            'name' => 'required',
            'url' => 'required|array|min:2',
            'url.*' => 'url',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Un nom de calendrier est requis !',
            'url.required' => 'Un lien de calendrier est requis !',
            'url.url' => "Ceci n'est pas un lien",
        ];
    }
}
