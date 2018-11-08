{{-- /resources/views/books/search.blade.php --}}
@extends('layouts.master')

@section('title')
    Search
@endsection

@section('content')
    <h1>Breakfast summary:</h1>



    @if($name)
        <h3>Name: {{ $name }} </h3>
        <h3>{{ $drink }} has {{ $drinkCalorie }} calories.</h3>
        <h3>{{ $meal }} has {{ $mealCalorie }} calories</h3>
        <h3>Total calories of the breakfast:  {{ $totalCalorie }} </h3>

    @endif
@endsection