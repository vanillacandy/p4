{{-- /resources/views/books/search.blade.php --}}
@extends('layouts.master')

@section('title')
    Search
@endsection

@section('content')
    <h3>View {{ $breakfast->name }} summary</h3>
    <div class='listbox'>

        <p>Rating: </p><h4>{{ $breakfast->rating }} </h4>
        <p>Calories: </p><h4>{{ $breakfast->calories }}</h4>
    </div>


@endsection