@extends('layout.main')
@section('title')
    Post :{{ $id }}
@endsection

@section('navbar')
    @parent
@endsection


@section('main-content')
    <div class="w-[80%] m-auto text-start text-2xl gap-6 pl-6 ">
        <div class="flex flex-col gap-6 justify-baseline align-middle text-xl text-start">
            <h2 class="text-xl">Post {{ $id }}</h2>
            <p><span class="post-desc-span">Title: </span> {{ $post->title }}</p>
            <p><span class="post-desc-span">Body: </span>{{ $post->body }}</p>
            <p><span class="post-desc-span">Author Name: </span>{{ $post->author_name }}</p>
            <p><span class="post-desc-span">Created at: </span>{{ $post->created_at }}</p>
        </div>
        <P class="text-xl">Want to edit this post? <a href="{{ route('posts.edit', $id) }}"
                class="font-[600] text-blue-900 hover:text-blue-700 p-2 rounded-md">Edit</a></P>
    </div>
@endsection
