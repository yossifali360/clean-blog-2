<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(25);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|min:3',
            'body' => 'required|string|max:2000',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|mimes:png,jpg,jpeg,gif,webp'
        ]);
        $imagePath = $request->file('image')->store('public');
        $imageName = basename($imagePath);
        $data['image'] = $imageName;
        Post::Create($data);
        return back()->with('success', __('admin.added'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required|string|min:3',
        ]);

        $post->update(['name' => $request->name]);
        $post->save();
        return redirect()->route('admin.posts.index')->with('success', __('admin.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', __('admin.deleted'));
    }
}
