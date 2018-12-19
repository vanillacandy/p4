@extends('layouts.master')

@section('title')
    Edit a {{ $breakfast->name }} details
@endsection

@section('content')

    <h3>Edit a {{ $breakfast->name }} details</h3>

    <form method='POST' action='/food/{{ $breakfast->id }}'>
        {{ method_field('put') }}
        {{ csrf_field() }}

        Breakfast meal: <input type='text' name='title' id='title' value='{{ old('title', $breakfast->name) }}'>
        @include('modules.field-error', ['field' => 'title'])

        Rating: <input type='text' name='rating' id='rating' value='{{ old('rating', $breakfast->rating) }}'></p>
        @include('modules.field-error', ['field' => 'rating'])

        Calories: <input type='text' name='calories' id='calories' value='{{ old('calories',$breakfast->calories) }}'></p>
        @include('modules.field-error', ['field' => 'calories'])

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