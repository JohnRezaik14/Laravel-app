@extends('layout.main')

@section('title')
    Posts
@endsection

@section('navbar')
    @parent
@endsection

@section('main-content')
    <div class="text-center w-46 md:w-md lg:w-lg xl:w-4xl 2xl:w-7xl m-auto">
        <div class="font-serif font-[500] text-blue-950 text-2xl">
            <h2>All Posts</h2>
        </div>
        <table class="mt-6 border-collapse border border-slate-400 w-full">
            <thead class="bg-slate-100">
                <tr>
                    <th class="border border-slate-300 p-2">Post Id</th>
                    <th class="border border-slate-300 p-2">Title</th>
                    <th class="border border-slate-300 p-2">Body</th>
                    <th class="border border-slate-300 p-2">Author name</th>
                    <th class="border border-slate-300 p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr class="hover:bg-slate-200 ">
                        <td class="border border-slate-300 ">
                            <a href="{{ route('posts.show', $post->id) }}"
                                class="text-blue-800 hover:bg-blue-200 w-full p-2 rounded-md">{{ $post->id }}</a>
                        </td>


                        <td class="border border-slate-300 ">
                            <a href="{{ route('posts.show', $post->id) }}"
                                class="text-blue-800 hover:bg-blue-200 w-full p-2 rounded-md">{{ Str::substr($post->title, 0, 15) . '....' }}</a>
                        </td>


                        <td class="border border-slate-300 p-1">{{ Str::substr($post->body, 0, 45) . '....' }}</td>


                        <td class="border border-slate-300 p-1">{{ $post->author_name }}</td>


                        <td class="border border-slate-300 p-1 flex flex-row gap-2  justify-center">
                            <a href="{{ route('posts.edit', $post->id) }}"
                                class="text-blue-800 hover:bg-blue-300 bg-blue-100 p-1 rounded-lg ">edit
                                it</a>
                            <a href="{{ route('posts.destory', $post->id) }}"
                                class="text-red-800 hover:bg-red-300 bg-red-100 p-1 rounded-lg ">delete
                                it</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
