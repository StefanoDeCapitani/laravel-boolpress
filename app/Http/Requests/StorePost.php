<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
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
            "title" => "required",
            "slug" => "required|unique:posts,slug",
            "subtitle" => "required",
            "content" => "required",
            "coverImg" => "required|file|mimes:jpg,bmp,png",
            "category_id" =>  "required"
        ];
    }
}