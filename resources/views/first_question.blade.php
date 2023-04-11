@extends('layouts.default')
@section('page-content')


<div class="text-3xl py-96 flex flex-col  px-64 text-center">
<h1>{{ $question->Pytanie }}</h1>
<form action="{{ route('handle_first_question') }}" method="post">
    @csrf
    <div>
        <input type="radio" id="yes" name="answer" value="yes" required>
        <label for="yes">Stacjonarna</label>
    </div>
    <div>
        <input type="radio" id="no" name="answer" value="no" required>
        <label for="no">Mobilna</label>
    </div>
    <button type="submit"class="btn btn-primary bg-blue-600 my-4">Następne pytanie</button>
</form>
</div>
@endsection