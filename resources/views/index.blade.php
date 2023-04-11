@extends('layouts.default')

@section('page-content')
    <section class="relative min-h-screen flex items-center">
        <div class="relative container mx-auto text-center">
            <img src="assets/images/background_image.png" alt="background_image" width="1200" height="400" id ="l1">
            <h3 class="absolute top-80 right-20 text-3xl sm:text-7xl font-bold"> Gry <span class="text-pink-700"> łączą,</span> a nie dzielą.</h3>
        </div>
        
        <div class="absolute bottom-0 left-0 right-0 p-20">
            <p class="text-center">Przesuń w dół aby dowiedzieć się więcej.</p>
        </div>
    </section>


    <section class="py-10">
        <div class="max-w-screen mx-auto h-1/2 flex justify-between ">
            <div class="mx-64 ">
                <h3 class="text-5xl font-bold mb-6">Wprowadzenie</h3>
                <h4 class="text-2xl mb-3 text-gray-200 text-justify">
                    Jeśli szukasz konsoli do gier, ale nie masz pojęcia, jaką wybrać, jesteś we właściwym miejscu. 
                    Na naszej stronie internetowej znajdziesz informacje na temat różnych konsol do gier, takich jak PlayStation, Xbox i Nintendo Switch. 
                    <br>
                    <br>
                    Przy wyborze konsoli warto zwrócić uwagę na kilka rzeczy.
                    <br>
                    <br>
                    Na naszej stronie znajdziesz szczegółowe informacje na temat różnych konsol, dzięki czemu łatwiej będzie Ci podjąć decyzję. 
                    Pamiętaj, że najważniejsze to znaleźć konsolę, która będzie dostosowana do Twoich potrzeb i preferencji.
                </h4>
                
            </div>
        <div class="text-xl flex flex-col items-start mr-36 font-bold">
          <a href="{{ route('informacje') }}"><img src="/assets/images/informacje.png" alt="iphone" id="iphonerotate"></a>
            <p>Kliknij telefon</p>
        </div>
        </div>
        
    </section>








@endsection