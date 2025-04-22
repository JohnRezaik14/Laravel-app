@extends('layout.main')

@section('title')
    404 not found
@endsection

@section('navbar')
    @parent
@endsection

@section('main-content')
    <div>
        <h2>This page doesn't exist</h2>
        <h3>if you want to go back , click home in the bar</h3>
    </div>
@endsection
