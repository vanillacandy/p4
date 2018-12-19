@extends('layouts.master')

@section('title')
    Edit a {{ $breakfast->name }} recipe
@endsection

@section('content')

    <h3>Edit a {{ $breakfast->name }} recipe</h3>

    <form method='POST' action='/food/{{ $breakfast->id }}'>
        {{ method_field('put') }}
        {{ csrf_field() }}

        <h3 for='title'>Breakfast meal name: </h3>
        <input type='text' name='title' id='title' value='{{ old('title', $breakfast->name) }}'>
        @include('modules.field-error', ['field' => 'title'])

        <h3>Ingredients</h3>
        <div class='listbox2'>
            <ul class='checkboxes'>
                @foreach($ingredients as $ingredientId => $ingredientName)
                    <li><label><input {{ (in_array($ingredientId, $ingredientsForThisRecipe)) ? 'checked' : '' }}
                                      type='checkbox'
                                      name='ingredients[]'
                                      value='{{ $ingredientId }}'> {{ $ingredientName }}</label></li>
                @endforeach
            </ul>
        </div>

        <input type='submit' value='Edit' class='btn btn-primary'>
    </form>


@endsection