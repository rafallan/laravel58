<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenerosRequest extends FormRequest
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
        // dd($this->method());   
        if ($this->method() == 'PATCH' || $this->method() == 'PUT') {

            return [
                'nome' => 'required|unique:generos,nome,' . $this->genero,
                'descricao' => 'required'
            ];
        } else {
            return [
                'nome' => 'required|unique:generos,nome',
                'descricao' => 'required'
            ];
        }
    }

    public function messages()
    {
        return [
            'required' => 'Esse campo é obrigatório',
            'unique'   => 'Esse gênero já está cadastrado',
        ];
    }
}
