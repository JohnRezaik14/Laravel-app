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
    {{-- action="{{ route('posts.update', ['post' => $id->$id]) }}" --}}
    <form method="POST">
        @method('PUT')
        @include('layout.form')
    </form>
@endsection
