@extends('layout.main')

@section('title')
    Edit Post
@endsection

@section('navbar')
    @parent
@endsection

@section('main-content')
    <div>
        <h2>Edit Post {{ $id }}</h2>
        <h3>Show the form for editing the specified Post.</h3>
    </div>
@endsection
