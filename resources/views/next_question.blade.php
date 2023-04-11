@extends('layouts.default')
@section('page-content')


<div class="text-3xl py-96 flex flex-col text-center px-64">
<h1>{{ $question->Pytanie }}</h1>
<form action="{{ route('handle_next_question') }}" method="post" >
    @csrf
    <input type="hidden" name="question_id" value="{{ $question->id }}">
    @if($question->id == 7)
    <div>
      <label class="block">
        <input type="radio" name="answer" value="yes" required> Tak
      </label>
      <label class="block">
        <input type="radio" name="answer" value="no" required> Nie
      </label>
        <div>
      <button type="submit" class="btn btn-primary bg-blue-600 my-4">Następne pytanie</button>

        </div>
    </div>
    @elseif($question->id == 6)
    <div id="checkbox-container">
      <label class="block">
        <input type="checkbox" name="answer[]" value="1080p" > 1080p
      </label>
      <label class="block">
        <input type="checkbox" name="answer[]" value="4k" > 4k
      </label>
      <label class="block">
        <input type="checkbox" name="answer[]" value="720p" > 720p
      </label>
      <label class="block">
        <input type="checkbox" name="answer[]" value="272p" > 272p
      </label>
        <div>
      <button type="submit" class="btn btn-primary bg-blue-600 my-4">Następne pytanie</button>

        </div>
    </div>

    @elseif($question->id == 5)
    <div class="flex flex-col items-center">
      <div id="checkbox-container">
        <div style="visibility:collapse; color:red; " id="chk_option_error">
          Please select at least one option.
        </div>
      <label class="block">
        <input type="checkbox" name="answer[]" value="HDMI" > HDMI
      </label>
      <label class="block">
        <input type="checkbox" name="answer[]" value="USB-C" > USB-C
      </label>
      <label class="block">
        <input type="checkbox" name="answer[]" value="AV" > AV
      </label>
      <label class="block">
        <input type="checkbox" name="answer[]" value="S Video" > S Video
      </label>
      <label class="block">
        <input type="checkbox" name="answer[]" value="VGA" > VGA
      </label >
        <div>
      <button type="submit" class="btn btn-primary bg-blue-600 my-4">Następne pytanie</button>

        </div>
    </div>
  </div>
    
    @elseif($question->id == 4)
    <div>
      <input type="text" name="answer" class="text-black text-center border-2 border-gray-400" required>
      <div>
      <button type="submit" class="btn btn-primary bg-blue-600 my-4">Następne pytanie</button>

      </div>
    </div>
    @elseif($question->id == 3)
    <div>
      <input type="text" name="answer" class="text-black text-center border-2 border-gray-400" required>
      <div>
      <button type="submit" class="btn btn-primary bg-blue-600 my-4">Następne pytanie</button>

      </div>
    </div>
    @elseif($question->id == 1)
    
    <div>
      
      <div>
        <label class="block">
      <input type="radio" name="answer" value="no" required> Stacjonarna
        </label>
        <label class="block">
      <input type="radio" name="answer" value="yes" required > Mobilna
        </label>
    </div>
     
    <button type="submit" class="btn btn-primary bg-blue-600 my-4" >Następne pytanie</button>

    
     
    </div>
    

    @else
    <div>
      <div>
        <label class="block">
        <input type="radio" name="answer" value="yes" required> Tak
        </label>
        <label class="block">
        <input type="radio" name="answer" value="no" required> Nie
        </label>
    </div>
     <button type="submit" class="btn btn-primary bg-blue-600 my-4">Następne pytanie</button>
     <div>
    @endif
</form>
<div>

<script>
  function handleData()
{
    var form_data = new FormData(document.querySelector("form"));
    
    if(!form_data.has("answer"))
    {
        document.getElementById("chk_option_error").style.visibility = "visible";
      return false;
    }
    else
    {
        document.getElementById("chk_option_error").style.visibility = "hidden";
      return true;
    }
    
}
</script>
@endsection