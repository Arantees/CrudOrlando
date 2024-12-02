<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoffeeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'brand' => 'required|max:255',
            'description' => 'nullable|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    /**
     * Mensagens de erro personalizadas.
     */
    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.max' => 'O nome não pode ultrapassar 255 caracteres.',
            'brand.required' => 'O campo marca é obrigatório.',
            'brand.max' => 'A marca não pode ultrapassar 255 caracteres.',
            'description.max' => 'A descrição não pode ultrapassar 500 caracteres.',
            'image.image' => 'O arquivo enviado precisa ser uma imagem.',
            'image.mimes' => 'A imagem deve ser do tipo: jpeg, png, jpg, gif.',
            'image.max' => 'A imagem não pode ultrapassar 2MB.',
        ];
    }
}
