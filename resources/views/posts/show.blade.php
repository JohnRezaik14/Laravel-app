@extends('layout.main')

@section('title')
    Post :{{ $id }}
@endsection

@section('navbar')
    @parent
@endsection

@section('main-content')
    <div>
        <h2>Post {{ $id }}</h2>
        <h3>Display the specified Post</h3>
        <P>Want to edit this post? <a href="{{ route('posts.edit', $id) }}">Edit</a></P>
    </div>
@endsection
