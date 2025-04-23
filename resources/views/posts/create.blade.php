@extends('layout.main')

@section('title')
    Create Post
@endsection

@section('navbar')
    @parent
@endsection

@section('main-content')
    <div class="text-center font-bold text-gray-900">
        <h2>Create Post</h2>
    </div>
@endsection
@section('form')
    <form action="{{ route('posts.store') }}" method="POST" class="w-[50%] m-auto">
        @include('layout.form')
    </form>
@endsection
