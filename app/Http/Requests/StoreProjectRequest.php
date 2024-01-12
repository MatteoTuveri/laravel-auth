<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => ['required','min:5','max:200','unique:posts'],
            'technologies' => ['required'],
            'release_date' =>['required']
        ];
    }

    public function messages(){
        return[
            'title.required' => 'il titolo è obbligatorio',
            'title.min' => 'il titolo deve avere almeno :min caratteri',
            'title.max' => 'il titolo deve avere massimo :max caratteri',
            'technologies.required' => 'L\'elenco delle tecnologie è obbligatorio',
            'release_date.required' => 'La data di rilascio è obbligatoria',
        ];
    }
}
