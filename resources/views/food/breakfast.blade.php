{{-- /resources/views/books/search.blade.php --}}
@extends('layouts.master')

@section('title')
    Search
@endsection

@section('content')
    <h3>Breakfast Book is a small menu for daily breakfast meal and it calculates meal calories. Search below for your favorite.</h3>


    @foreach($breakfasts as $breakfast)
        <p>{{$breakfast -> name}} <a href='/food/{{$breakfast->id}}'>View</a> <a href='/food/{{$breakfast->id}}/delete'>Delete</a></p>



    @endforeach

@endsection

