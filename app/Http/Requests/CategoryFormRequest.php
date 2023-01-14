<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
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
            'name' =>[
                'required',
                'max:255'
            ],
            'slug'=>['required','max:255'],
            'description' =>['required','max:255'],
            'image'=>['image','nullable'],
            'meta_title' =>['nullable','max:255'],
            'meta_keyword' =>['nullable','max:255'],
            'meta_description' =>['nullable','max:255'],
            

        ];
    }
}
