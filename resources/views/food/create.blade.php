@extends('layouts.master')

@section('title')
    Add a recipe
@endsection

@section('content')
    <h1>Add a breakfast recipe</h1>

    <form method='POST' action='/food'>
        {{ csrf_field() }}

        <label for='title'>Breakfast meal name: </label>
        <input type='text' name='title' id='title' value='{{ old('title') }}'>
        @include('modules.field-error', ['field' => 'title'])

        <label>Ingredients</label>

        <ul class='checkboxes'>
            @foreach($ingredients as $ingredientId => $ingredientName)
                <li><label><input {{ (in_array($ingredientId, old('ingredients',[]) )) ? 'checked' : '' }}
                                  type='checkbox'
                                  name='ingredients[]'
                                  value='{{ $ingredientId }}'> {{ $ingredientName }}</label></li>
            @endforeach
        </ul>

        <input type='submit' value='Add' class='btn btn-primary'>
    </form>


@endsection