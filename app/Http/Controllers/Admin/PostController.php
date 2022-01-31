<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePost;
use App\Http\Requests\UpdatePost;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = null;

        if(Auth::user()->role === "admin"){
            $posts = Post::paginate(10);
        } else {
            $posts = Post::where("user_id", Auth::id())->with("user")->with("category")->with("tags")->paginate(10);
        }

        return view("admin.blog.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view("admin.blog.create", compact("categories", "tags"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        $data = $request->validated();
        $data["user_id"] = Auth::id();

        $post = Post::create($data);  

        $img_path = Storage::put("/posts/images", $request->coverImg);
        $post->coverImg = "storage/" . $img_path;

        $post->tags()->sync($request->tags);

        $post->save();

        return redirect()->route("admin.posts.show", $post->slug)->with("message", "Nuovo post creato con successo!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view("admin.blog.show", compact("post", "categories", "tags"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, Request $request)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view("admin.blog.edit", compact("post", "categories", "tags"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePost $request, Post $post)
    {   
        $data = $request->validated();

        if($request->coverImg){
            Storage::delete($post->coverImg);
            $img_path = Storage::put("/posts/images", $request->coverImg);
            $data["coverImg"] = "storage/" . $img_path;
        }

        $post->update($data);
        $post->tags()->sync($request->tags);
        $post->save();
            
        return redirect()->route("admin.posts.show", $post->slug)->with("message", "Modifiche salvate con successo!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->tags()->detach();
        Storage::delete($post->coverImg);
        $post->delete();

        return redirect()->route("admin.posts.index")->with("message", "Post eliminato con successo!");
    }
}
