<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Category;

class PostController extends Controller
{
    protected $validationRules = [
        'title' => 'string|required|max:100',
        'content' => 'string|required',
        'category_id' => 'nullable|exists:categories,id'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view("admin.posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validations
        $request->validate($this->validationRules);

        $newPost = new Post();
        $newPost->fill($request->all());

        $newPost->slug = $this->getSlug($request->title);
        $newPost->save();

        return redirect()->route('admin.posts.index')->with('success',"Il Post è stato creato");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("admin.posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate($this->validationRules);

        if($post->title != $request->title) {

            $post->slug = $this->getSlug($request->title);

        }
        $post->fill($request->all());

        $post->save();
        return redirect()->route('admin.posts.index')->with('success',"il Post  {$post->id} aggiornato");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $post = Post::find($request->id);
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success',"Post eliminato con successo");
    }
    
    /** 
     * getSlug - return unique slug
     * 
     * @param string $title
     * @return string
    */
    private function getSlug($title) 
    {
        $slug = Str::of($title)->slug('_');

        $postExist = Post::where('slug', $slug)->first();

        $count = 2;

        while($postExist) {
            $slug = Str::of($title)->slug('_') . "-{$count}";
            $postExist = Post::where('slug', $slug)->first();
            $count++;
        }

        return $slug;
    }
}
