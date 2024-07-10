<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Ensure to import the Post model

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all posts ordered by latest and paginate them
        $posts = Post::latest()->paginate(10);
        
        // Return the view with posts data
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return the view to create a new post
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Create a new post record in the database
        Post::create($request->only(['title', 'content']));

        // Redirect back to the index page with a success message
        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find the specific post by its ID
        $post = Post::findOrFail($id);
        
        // Return the view with the post data
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find the specific post by its ID
        $post = Post::findOrFail($id);
        
        // Return the view to edit the post with the post data
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Find the specific post by its ID and update its data
        $post = Post::findOrFail($id);
        $post->update($request->only(['title', 'content']));

        // Redirect back to the index page with a success message
        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the specific post by its ID and delete it
        $post = Post::findOrFail($id);
        $post->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully.');
    }
}
