@extends('layouts.default')
@section('page-content')


<div class="text-3xl py-96 flex flex-col z-10 view_parent_2">

<center>

 
  <form method="POST" action="/questionnaire/{{ $question->id}}" id="questionnaire-form" onsubmit="return handleData()">
    @csrf
<div class="card w-1/3 text-black">
    <div class="card-body"><h5 class="card-title font-bold text-4xl">Pytanie {{ $question['id'] }}</h5></div>
    <div><p class="card-text font-bold">{{ $question['Pytanie'] }}</p></div>
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
</center></div>
</div>
<script>




   




function handleData()
{
    var form_data = new FormData(document.querySelector("form"));
    
    if(!form_data.has("answer[]"))
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


  // Get a reference to the form element
  var form = document.querySelector('#questionnaire-form');

  // Add an event listener to the form's submit event
  form.addEventListener('submit', function(event) {
    // Get the current value of the form action attribute
    var formAction = form.getAttribute('action');

    // Extract the current question id from the form action
    var questionId = formAction.match(/\/(\d+)/)[1];

    // Increment the question id
    var nextQuestionId = parseInt(questionId, 10) + 1;

    // Update the form action attribute with the new question id
    form.setAttribute('action', '/questionnaire/' + nextQuestionId);
  });
</script>
</center>


@endsection