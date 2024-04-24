<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreprojectRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|max:100",
            "description" => "required|max:5000",
            "thumb" => "nullable",
            "code" => "required|max:50",
            "link" => "required|max:200",
            'type_id' => 'nullable|exists:types,id',
            'cover-image'=> 'nullable|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Il titolo deve essere inserito',
            'name.max' => "Il titolo deve avere massimo :max caratteri",
            'code.max' => "La tipologia del linguaggio utilizzato deve avere massimo :max caratteri",
            'code.required' => 'La tipologia del linguaggio utilizzato deve essere inserita',
            'description.max' => "Inserisci una descrizione di massimo :max caratteri",
            'link.required' => "L'url del tuo indirizzo deve essere inserito",
            
            
        ];
    }

    public function attributes(): array{
        return [
            "name"=> "titolo",
            "description"=> "descrizione",
            "code"=> "linguaggio",
            "link"=> "url",
        ] ;
    }
}


