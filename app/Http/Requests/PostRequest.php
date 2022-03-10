<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            "title"=>"required|min:3|unique:posts",
            "description"=>"required|min:10"
        ];
    }

    public function messages(){
        return [
            "title.required"=>"Come on! Give your post a proper unique title..",
            "title.unique"=>"Come on! Give your post a proper unique title.."
        ];
    }
}
