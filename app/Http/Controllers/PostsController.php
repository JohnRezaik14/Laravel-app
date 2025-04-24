<?php
namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Events\PostDeleted;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // $users = \App\Models\User::all();
        // foreach ($users as $user) {
        //     $postCount = $user->posts()->count();
        //     $user->update(['posts_count' => $postCount]);
        // }
        $posts = Post::with('user:id,name,posts_count')->paginate(5);
        return view('posts.index', ['posts' => $posts]);
        // return $posts;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Post::class);
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
        ]);

        $validated['user_id'] = Auth::id();

        $post = Post::create($validated);
        event(new PostCreated($post));
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
        $this->authorize('update', $post);
        return view('posts.edit', ['id' => $id, 'post' => $post]);

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
        ]);

        $validated['user_id'] = $post->user_id;

        $post->update($validated);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $this->authorize('update', $post);
        $post->delete();
        if (Post::destroy($id)) {
            event(new PostDeleted($post));
        }
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
