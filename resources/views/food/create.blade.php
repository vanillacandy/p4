@extends('layouts.master')

@section('title')
    Add a recipe
@endsection

@section('content')
    <h3>Add a breakfast recipe</h3>

    <form method='POST' action='/food'>
        {{ csrf_field() }}

        <div class='inputForm'>
            <input type='text' name='title' id='title' placeholder='Enter a breakfast name..' value='{{ old('title') }}'></p>
        </div>
        @include('modules.field-error', ['field' => 'title'])

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