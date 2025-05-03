<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::with('user')->latest()->get();
    }

    public function show(Post $post)
    {
        return $post->load('user');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = $request->user()->posts()->create($validated);

        return response()->json([
            'message' => 'Post created successfully',
            'post'    => $post->load('user'),
        ], 201);
    }

    public function update(Request $request, Post $post)
    {

        $validated = $request->validate([
            'title'   => 'sometimes|string|max:255',
            'content' => 'sometimes|string',
        ]);

        $post->update($validated);

        return response()->json([
            'message' => 'Post updated successfully',
            'post'    => $post->load('user'),
        ]);
    }

    public function destroy(Post $post)
    {

        $post->delete();

        return response()->json(['message' => 'Post deleted successfully']);
    }
}
