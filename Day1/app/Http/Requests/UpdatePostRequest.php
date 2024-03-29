<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdatePostRequest extends FormRequest
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
            'title' => ['required','min:3',Rule::unique('posts')->ignore($this->post)],
            'description' => 'required|min:10',
            'user_id'=>'exists',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'title.min' => 'the minimum length is 3',
            'description.required' => 'A description is required',
            'description.min' => 'the minimum length is 3',
        ];
    }
}
