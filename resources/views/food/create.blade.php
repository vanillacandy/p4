@extends('layouts.master')

@section('title')
    Add a recipe
@endsection

@section('content')
    <h3>Add a breakfast recipe. * Required fields</h3>

    <form method='POST' action='/food'>
        {{ csrf_field() }}

        * Breakfast name:<input type='text' name='title' id='title'  value='{{ old('title') }}'></p>
        @include('modules.field-error', ['field' => 'title'])

        * Rating: (Please enter a number 1~5)<input type='text' name='rating' id='rating' value='{{ old('rating') }}'></p>
        @include('modules.field-error', ['field' => 'rating'])

        * Calories: (Please enter a number 1~3000)<input type='text' name='calories' id='calories'  value='{{ old('calories') }}'></p>
        @include('modules.field-error', ['field' => 'calories'])


        <h3>Ingredients</h3>
        <div class='listbox2'>
            <ul class='checkboxes'>
                @foreach($ingredients as $ingredientId => $ingredientName)
                    <li><label><input {{ (in_array($ingredientId, old('ingredients',[]) )) ? 'checked' : '' }}
                                      type='checkbox'
                                      name='ingredients[]'
                                      value='{{ $ingredientId }}'> {{ $ingredientName }}</label></li>
                @endforeach
            </ul>
        </div>

        <input type='submit' value='Add' class='btn btn-primary'>
    </form>


@endsection