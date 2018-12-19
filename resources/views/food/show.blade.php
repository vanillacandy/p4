{{-- /resources/views/books/search.blade.php --}}
@extends('layouts.master')

@section('title')
    Search
@endsection

@section('content')

    <h2>View {{ $breakfast->name }} summary</h2>
    <h3>Rating: {{ $breakfast->rating }} </h3>
    <h3>Calories: {{ $breakfast->calories }} </h3>


@endsection