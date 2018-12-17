{{-- /resources/views/books/search.blade.php --}}
@extends('layouts.master')

@section('title')
    Search
@endsection

@section('content')
    <h5>Breakfast Book is a small menu for daily breakfast meal and it calculates meal calories. Search below for your favorite.</h5>

    <form method='GET' action='/food/search-process'>

        <fieldset>
            <label>* Name </label>
            <input type='text' autocomplete='off' name='name' id='name' value='{{ old('name') }}'>
            @include('modules.field-error',['field'=>'name'])
        </fieldset>

        <fieldset class='radios'>
            <legend> * Select a main meal for breakfast</legend>
            <ul class='radios'>
                <!-- Note that each radio has the same name of `day` -->
                <li><label><input type='radio'
                                  name='meal'
                                  value='omelet'
                                {{ (old('meal') == 'omelet') ? 'checked' : '' }}> Cheese Omelet </label>
                <li><label><input type='radio'
                                  name='meal'
                                  value='french toast'
                                {{ (old('meal') == 'french toast') ? 'checked' : '' }}> Cinnamon Raisin French Toast
                    </label>
                <li><label><input type='radio'
                                  name='meal'
                                  value='chicken waffle'
                                {{ (old('meal') == 'chicken waffle') ? 'checked' : '' }}> Chicken and Waffle</label>
                <li><label><input type='radio'
                                  name='meal'
                                  value='breakfast bowl'
                                {{ (old('meal') == 'breakfast bowl') ? 'checked' : '' }}> Country Breakfast Bowl
                    </label>
                <li><label><input type='radio'
                                  name='meal'
                                  value='ham eggs'
                                {{ (old('meal') == 'ham eggs') ? 'checked' : '' }}> Ham and Eggs</label>
            </ul>
        </fieldset>
        @include('modules.field-error',['field'=>'meal'])

        <label for='drink'> * Select a drink </label>
        <select name='drink' id='drink'>
            <option value='' {{ old('drink') == 'choose' ? 'selected' : '' }}>Choose one...</option>
            <option value='milk' {{ old('drink') == 'milk' ? 'selected' : '' }}>Milk</option>
            <option value='chocolate milk' {{ old('drink') == 'chocolate milk' ? 'selected' : '' }}>Chocolate milk</option>
            <option value='soy milk' {{ old('drink') == 'soy milk' ? 'selected' : '' }}>Soy milk</option>
            <option value='orange juice' {{ old('drink') == 'orange juice' ? 'selected' : '' }}>Orange juice</option>
            <option value='apple juice' {{ old('drink') == 'apple juice' ? 'selected' : '' }}>Apple juice</option>
        </select>
        @include('modules.field-error',['field'=>'drink'])

        <input type='submit' value='Search' class='btn btn-primary'>

    </form>

    @if(count($errors) > 0)
        <div class='container alert alert-danger'>
            Please fill all the required fields.
        </div>
    @endif

@endsection