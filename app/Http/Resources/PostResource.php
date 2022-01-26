<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        if($request->path() === "api/guest/posts"){
            return [
                "id" => $this->id,
                "title" => $this->title,
                "slug" => $this->slug,
                "subtitle" => $this->subtitle,
                "content" => Str::limit(trim(strip_tags($this->content)) , 200, "..."),
                "user" => $this->user,
                "coverImg" => $this->coverImg,
                "category" => $this->category,
            ];
        }

        return [
            "id" => $this->id,
            "title" => $this->title,
            "slug" => $this->slug,
            "subtitle" => $this->subtitle,
            "content" => $this->content,
            "user" => $this->user,
            "coverImg" => $this->coverImg,
            "category" => $this->category,
            "tags" => $this->tags,
        ];
    }
}
