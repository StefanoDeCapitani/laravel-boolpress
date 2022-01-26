<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["title", "slug", "subtitle", "content", "coverImg", "category_id", "user_id"];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user(){
        return $this->belongsTo("App\User");
    }

    public function category(){
        return $this->belongsTo("App\Category");
    }

    public function tags(){
        return $this->belongsToMany("App\Tag");
    }
}
