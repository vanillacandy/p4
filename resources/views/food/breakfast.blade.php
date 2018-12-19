{{-- /resources/views/books/search.blade.php --}}
@extends('layouts.master')

@section('title')
    Main
@endsection

@section('content')

    <h3>This is a menu for daily breakfast. Search below for your favorite.</h3>
    <h3><a href='/food/create'>Add a breakfast menu</a></h3>
    <div class='listbox'>
    @foreach($breakfasts as $breakfast)

            <p>{{$breakfast -> name}}  &nbsp;<a href='/food/{{$breakfast->id}}'>View</a> <a href='/food/{{$breakfast->id}}/delete'>Delete</a> <a href='/food/{{$breakfast->id}}/edit'>Edit</a></p>

    @endforeach
    </div>
@endsection

