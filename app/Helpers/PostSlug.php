<?php

namespace App\Helpers;

use App\Post;
use Illuminate\Support\Str;

class PostSlug{

    public static function generateUniqueSlug($post){
        $slug = Str::slug($post->title);
        $uniqueSlug = $slug;
        $i = 0;
        while(Post::where("slug", "=", $uniqueSlug)->first()){
            $uniqueSlug = $slug . "-" . $i;
            $i++;
        } 
        return $uniqueSlug;
    }
}


