<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProduct extends FormRequest
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
        $rules = [
            'title'    => ['required', 'string', 'min:3', 'max:100', "unique:products,title,{$this->segment(3)},id"],
            'description' => ['required','string', 'min:6', 'max:500'],            
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
            'image' => ['required', 'image'],            
        ];

        if ($this->method() == 'PUT') {
            $rules['image'] = ['nullable', 'image'];
        }
        
        return $rules;
    }
}
