@extends('layouts.default')
@section('page-content')

<div class="col-md-8 col-md-offset-2 m-40">
    <h1>Edit Comment</h1>
        

    <form action="{{ url('update') }}" method="PUT">
        @csrf
        <label for="name">Name:</label>
        <input type="hidden" name="nazwa">
        {{ $Konsole['nazwa'] }}


        
</div>