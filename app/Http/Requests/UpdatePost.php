<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Post;

class UpdatePost extends FormRequest
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
        $post = Post::where("slug" , "=", $this->slug)->first();

        return [
            "title" => "required",
            "slug" => ["required",
            Rule::unique('posts')->ignore($post->id)],
            "subtitle" => "required",
            "content" => "required",
            "coverImg" => "file|mimes:jpg,bmp,png",
            "category_id" =>  "required"
        ];
    }
}