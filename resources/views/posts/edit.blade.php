@extends('layout.main')

@section('title')
    Edit Post
@endsection

@section('navbar')
    @parent
@endsection

@section('main-content')
    <div class="text-center font-bold text-gray-900">
        <h2>Edit Post {{ $id }}</h2>
    </div>
@endsection
@section('form')
    <form class="w-[50%] m-auto" action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('layout.form', ['post' => $post])
    </form>
@endsection
