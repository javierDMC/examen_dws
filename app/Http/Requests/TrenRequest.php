<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrenRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        return[
            'name' => 'required',
            'number' => 'required|numeric|min:0|max:1402',
            'model' => 'required|numeric|min:100|max:130',
            'maquinista_id' => 'required|exists:maquinistas,id'
        ];

    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'number.min' => 'El numero de tren no puede ser anterior a 0',
            'number.max' => 'El numero de tren no puede ser superior a 1402',
            'model.min' => 'El modelo debe estar comprendido entre 100 y 130'
            //...
        ];
    }

}
