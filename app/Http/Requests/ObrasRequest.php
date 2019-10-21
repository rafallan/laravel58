<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ObrasRequest extends FormRequest
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
                'generos'    => 'required|min:1',
                'categoria_id' => 'required',
                'titulo' => 'required|unique:obras,titulo,' . $this->obra,
                'ano' => 'required|numeric',
                'sinopse' => 'required',
                'imagem' => 'mimes:jpeg,jpg,png|max:2048',
            ];
        } else {
            return [
                'generos'    => 'required|min:1',
                'categoria_id' => 'required',
                'titulo' => 'required|unique:obras,titulo',
                'ano' => 'required|numeric',
                'sinopse' => 'required',
                'imagem' => 'required|mimes:jpeg,jpg,png|max:2048',
            ];
        }
    }

    public function messages()
    {
        return [
            'required'   => 'O campo :attribute é obrigatório',
            'unique'     => 'Obra já cadastrada',
            'mimes'      => 'Somente imagens png e jpg',
            'max'        => 'A imagem não pode ser maior que 2 MB',
            'numeric'    => 'O ano tem que ser um número inteiro',
        ];
    }
}
