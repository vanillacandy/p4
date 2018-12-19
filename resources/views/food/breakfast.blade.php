{{-- /resources/views/books/search.blade.php --}}
@extends('layouts.master')

@section('title')
    Search
@endsection

@section('content')
    <h3>This is a menu for daily breakfast. Search below for your favorite.</h3>


    @foreach($breakfasts as $breakfast)
        <p>{{$breakfast -> name}} <a href='/food/{{$breakfast->id}}'>View</a> <a href='/food/{{$breakfast->id}}/delete'>Delete</a></p>



    @endforeach

@endsection

