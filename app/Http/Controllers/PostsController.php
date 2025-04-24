<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $posts = Post::with('user:id,name')->paginate(5);
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::select('id', 'name')->get();
        return view('posts.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'   => 'required|string|min:5|max:255',
            'body'    => 'required|string|min:10',
            'enabled' => 'required|boolean',
            'user_id' => 'required|exists:users,id',
        ]);
        Post::create($validated);
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        $post = Post::with('user:id,name')->find($id);
        if (! $post) {
            return view('NotFound');
        }
        return view('posts.show', ['id' => $id, 'post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $post = Post::find($id);
        if (! $post) {
            return view('NotFound');
        }
        $users = User::select('id', 'name')->get();
        return view('posts.edit', ['id' => $id, 'post' => $post, 'users' => $users]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);

        if (! $post) {
            return redirect()->route('posts.index')->with('error', 'Post not found.');
        }

        $validated = $request->validate([
            'title'   => 'required|string|min:5|max:255',
            'body'    => 'required|string|min:10',
            'enabled' => 'required|boolean',
            'user_id' => 'required|exists:users,id',
        ]);

        $post->update($validated);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        Post::destroy($id);
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
