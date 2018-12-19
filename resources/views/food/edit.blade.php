@extends('layouts.master')

@section('title')
    Edit a {{ $breakfast->name }} recipe
@endsection

@section('content')

    <h1>Edit a {{ $breakfast->name }} recipe</h1>

    <form method='POST' action='/food/{{ $breakfast->id }}'>
        {{ method_field('put') }}
        {{ csrf_field() }}

        <label for='title'>Breakfast meal name: </label>
        <input type='text' name='title' id='title' value='{{ old('title', $breakfast->name) }}'>
        @include('modules.field-error', ['field' => 'title'])

        <label>Ingredients</label>

        <ul class='checkboxes'>
            @foreach($ingredients as $ingredientId => $ingredientName)
                <li><label><input {{ (in_array($ingredientId, $ingredientsForThisRecipe)) ? 'checked' : '' }}
                                  type='checkbox'
                                  name='ingredients[]'
                                  value='{{ $ingredientId }}'> {{ $ingredientName }}</label></li>
            @endforeach
        </ul>

        <input type='submit' value='Add' class='btn btn-primary'>
    </form>


@endsection