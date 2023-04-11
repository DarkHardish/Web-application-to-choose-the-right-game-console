
@extends('layouts.default')
@section('page-content')


@php
$consolePoints = collect($consolePoints);
$consolePoints = $consolePoints->sortByDesc('points');
@endphp

       

<table class="py-64  flex flex-col justify-between items-center">
    <tr>
      <th class="text-center text-4xl">Konsola</th>
      <th class="text-center text-4xl col-3">Punkty</th>
      <th class="text-center text-4xl">Procenty</th>
      <th class="text-center text-4xl">Zdjęcie</th>
    </tr>
    @foreach ($consolePoints->take(3) as $console)
      <tr>
        <td class="border-b text-center pb-1 pt-1 text-4xl">{{ str_replace("_", " ", $console['console']) }}</td>
        <td class="border-b text-center pb-1 pt-1 text-4xl">{{ $console['points'] }} / {{ count($console['questions'])}}</td>
        <td class="border-b text-center pb-1 pt-1 text-4xl">{{ round($console['percentage']) }}%</td>
        <td class="border-b text-center pb-1 pt-1"> <a href="/Konsole/{{$console['id'] }}/{{ $console['console'] }}"><img src="{{asset('assets/images/'.$console['image'] )}}" class="w-96"></a></td>
      </tr>
    @endforeach
  </table>

 <center> <img src="/assets/images/pointer_down.png" alt="pointer_down" id="pointer_down"></center>
<!-- <div class="flex flex-col items-center pt-32 text-xl font-medium">

 </div>--!>
      <!-- Display the records from the Konsole table -->
     


  

      <table class="pt-96  flex flex-col justify-between items-center">
        <tr >
          <th class="text-center text-2xl">Konsola</th>
          <th class="text-center text-2xl">Punkty</th>
          <th class="text-center text-2xl">Zdjęcie</th>
          <th class="text-center text-2xl">Procent</th>
          <th class="text-center text-2xl">Pytania</th>
        </tr>
        @foreach ($consolePoints as $console)
        @if($console['percentage'])
          <tr>
            <td class="border-b text-center pb-1 pt-1 text-lg">{{str_replace("_"," ", $console['console']) }}</td>
            <td class="border-b text-center pb-1 pt-1 text-lg">{{ $console['points'] }} /{{ count($console['questions']) }}</td>
            <td class="border-b text-center pb-1 pt-1"> <a href="/Konsole/{{$console['id'] }}/{{ $console['console'] }}">   <img src="{{asset('assets/images/'.$console['image'] )}}" class="w-48"></a></td>
            <td class="border-b text-center pb-1 pt-1 text-lg">{{ round($console['percentage']) }}%</td>
            <td class="border-b text-center pb-1 pt-1 text-lg">
              <ul>
                @foreach ($console['questions'] as $question)
                  <li>{!! $question !!}</li>
                @endforeach
              </ul>
            </td>
            
          </tr>
          
          @endif
        @endforeach
      </table>
    
</div>


<script>
    document.getElementById("pointer_down").addEventListener("click", function() {
      window.scrollBy({
        top: 1000,
        left: 0,
        behavior: 'smooth'
      });
    });
  </script>
@endsection