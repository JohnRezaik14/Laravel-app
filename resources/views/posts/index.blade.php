@extends('layout.main')

@section('title')
    Posts
@endsection

@section('navbar')
    @parent
@endsection

@section('main-content')
    <div class="text-center w-[60%] m-auto">
        <div class="">
            <h2>Posts Page</h2>
            <h3>Display a listing of the Posts.</h3>
        </div>
        <table class="mt-6 border-collapse border border-slate-400 w-full">
            <thead class="bg-slate-100">
                <tr>
                    <th class="border border-slate-300 p-2">Post Id</th>
                    <th class="border border-slate-300 p-2">Details</th>
                    <th class="border border-slate-300 p-2">Edit</th>
                    <th class="border border-slate-300 p-2">Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-slate-50">
                    <td class="border border-slate-300 p-2">15</td>
                    <td class="border border-slate-300 p-2">
                        <a href="{{ route('posts.show', 15) }}" class="text-blue-600 hover:text-blue-800"> post details</a>
                    </td>
                    <td class="border border-slate-300 p-2">
                        <a href="{{ route('posts.edit', 15) }}" class="text-blue-600 hover:text-blue-800">edit it</a>
                    </td>
                    <td class="border border-slate-300 p-2">
                        <a href="{{ route('posts.destory', 15) }}" class="text-red-600 hover:text-red-800">delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
