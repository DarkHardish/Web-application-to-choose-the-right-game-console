
@extends('layouts.default')
@section('page-content')

<div class="py-64 px-64 flex flex-col text-center text-3xl">
    <p class="px-64 py-24">Formularz składa się z pytań, których celem jest pomoc w wyborze odpowiedniej konsoli do gier. <br>
      Pytania dotyczą preferencji użytkownika, takich jak budżet, długośc pracy baterii, potrzeba wykorzystania funkcji multimedialnych itp. <br>
      Na podstawie odpowiedzi udzielonych przez użytkownika, formularz proponuje odpowiednie modele konsol, spełniające jego wymagania. <br>
      Dzięki temu, użytkownik ma możliwość wyboru konsoli, która najlepiej spełni jego oczekiwania i potrzeby.</p>
      <div>
      <button type="button" id="start-button" class="btn btn-primary bg-blue-600">Start</button>
      </div>
    </div>
    
  
 

    <script>
        document.getElementById('start-button').addEventListener('click', function() {
          window.location.href = 'first-question';
        });
      </script>

@endsection