<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //we want to show to the user posts data
        //with the user created it and behind the scenes send the the user_id who created it
        $posts = DB::table('posts')->
            join('users', 'posts.user_id', '=', 'users.id')->select('posts.*', 'users.name as author_name')->get();
        // return $posts;
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all()->setVisible(['name', 'id']);
        return view('posts.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return "Store a newly created resource in storage.";
        // $request->validate([
        //     'title'   => 'required|min:5',
        //     'body'    => 'min:10|string',
        //     'enabled' => 'boolean',
        //     'user_id' => 'exists:users,id',
        // ]);
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        $post = DB::table('posts')->where('posts.id', $id)->
            join('users', 'posts.user_id', '=', 'users.id')->select('posts.*', 'users.name as author_name')->first();
        if ((int) $id) {
            return view('posts.show', ['id' => $id, 'post' => $post]);
        } else {
            return view('NotFound');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if ((int) $id) {
            return view('posts.edit', ['id' => $id]);
        } else {
            return view('NotFound');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // return "Update the specified resource in storage.";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // return ("Remove the specified resource from storage");
    }
}
