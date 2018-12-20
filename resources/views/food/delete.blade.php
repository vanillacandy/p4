@extends('layouts.master')


@section('title')
    <p2>Confirm deletion: {{ $breakfast->name }}</p2>
@endsection

@section('content')
    <h3>Confirm deletion</h3>

    <div class='listbox'>
        <h3>Are you sure you want to delete <strong>{{ $breakfast->name }}</strong>?</h3>
        <form method='POST' action='/food/{{ $breakfast->id }}'>
            {{ method_field('delete') }}
            {{ csrf_field() }}
            <input type='submit' value='delete' class='btn btn-danger btn-small'>
        </form>
    <div>
        <h3>
            <a href='/'>No, I changed my mind.</a>
        </h3>

@endsection
