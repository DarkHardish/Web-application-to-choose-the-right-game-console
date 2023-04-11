@extends('layouts.default')
@section('page-content')
<div class=" flex ">
    <div class=" pt-96 w-1/3">
        <form action="{{ route('filter') }}" method="POST">
            @csrf
            <div class="flex items-start gap-3 flex-col px-64">
                <p class="text-3xl">Producent</p>
                <div class="items-center gap-2 text-2xl">
                    <label class="block">
                        <input type="checkbox" name="producent[]" value="Sony"> Sony
                    </label>
                    <label class="block">
                        <input type="checkbox" name="producent[]" value="Microsoft"> Microsoft
                    </label>
                    <label class="block">
                        <input type="checkbox" name="producent[]" value="Nintendo"> Nintendo
                    </label>
                </div>
                <p class="text-3xl">Cena</p>
                    <div >
                        <input type="text" name="price" placeholder="Wpisz cene" class="text-black text-center text-lg">
                    </div>
                    <p class="text-3xl">Nazwa</p>
                    <div>
                        <input type="text" name="name" placeholder="Wyszukaj po nazwie" class="text-lg text-black text-center">
                    </div>
                <div class="flex gap-4">
            <button type="submit" value="Filter" class="btn btn-primary bg-blue-600">Flter</button>
            <a href="{{ route('console.reset') }}" class="btn btn-danger">Reset</a>
                </div>
            </div>
          </form>
          
    </div>
<div class="consoles-container flex justify-around flex-wrap gap-3 py-80  pr-48 pl-32 w-2/3 align-center m-auto">
    
  

    @foreach ($consoles as $console)
        <div class="console-card px-48">
            <a href="Konsole/{{$console['id'] }}/{{ $console['nazwa'] }}">  
            <img src="{{ asset('assets/images/'.$console->image) }}" alt="Product image" class="h-36 "></a>
         <center>   <h5>{{ $console->producent }} {{ str_replace("_", " " ,$console->nazwa) }}</h5></center>
        </div>
    @endforeach
</div>

</div>
@endsection