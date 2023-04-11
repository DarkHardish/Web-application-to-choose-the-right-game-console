<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script
    src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
    crossorigin="anonymous">
    </script>
    
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}"/>
    <script src="https://kit.fontawesome.com/119d70e2a2.js" crossorigin="anonymous"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&display=swap" rel="stylesheet">
    
    <title>FAVRIATE</title>
    <link rel = "icon"  id="icon">
</head>
<body class="text-white font-body h-full">
    <header class="fixed  top-0 left-0 right-0 z-50 flex justify-between  h-24">
        
            <div class="py-1 px-48 flex flex-1 ">
            <a href="{{ route('dom') }}" class="text-2xl mx-2 flex items-center  no-underline hover:no-underline  font-body font-bold">
            <img src="/assets/images/logo.png" alt="logo" width="50" height="50" class="pr-2">FAVRIATE
            </a>
            </div>
         
            <ul class="pr-40 flex items-center flex-2 justify-between gap-8 text-xl font-bold">
               <li class=""> <a href="{{ route('konsole') }}" class="no-underline hover:no-underline text-grey-700">Konsole</a> </li>
               @auth
               <li>
               <a href="{{ route('home') }}">{{ Auth::user()->name }}</a>
               <li>
               @else
                <li class=""> <a href="{{ route('home') }}" class="no-underline hover:no-underline ">Login</a> </li>
                @endauth
                    <li> <a href="/pytania" class="no-underline hover:no-underline hover:text-white btn btn-succes bg-gradient-to-r from-purple-900 to-violet-800 text-white font-bold ">Rekomendacja</a> </li>
            </ul>
    </header>
    <main class="min-h-screen">
        @yield('page-content')
    </main>
    <footer>
        <div class="container mx-auto p-4">
            <hr class=" border-solid border-white  ml-80 mr-0 "/>
                <div class="py-1 pl-10 flex">
                    <a href="{{ route('dom') }}" class="text-2xl mx-2 flex items-center  no-underline hover:no-underline hover:text-white font-body font-bold">
                    <img src="/assets/images/logo.png" alt="logo" width="50" height="50" class="pr-2">FAVRIATE
                    </a>
                   
                </div>
                <div class=" flex justify-end gap-5 items-center">
                    <div class="flex-1 ml-10">
                        <p>&copy; Ta strona zawiera informacje dotyczące różnych konsol do gier, w tym historii, specyfikacji technicznych, aktualnych i przyszłych tytułów oraz porównań między poszczególnymi platformami. Informacje na tej stronie są aktualne na dzień publikacji i mogą ulec zmianie w przyszłości.</p>
                    </div>
                    <div class="flex-3">
                        <a href="#"><img src="/assets/images/facebook_icon.png" alt="facebook_icon"></a>
                    </div>
                    <div class="flex-3">
                        <a href="#"><img src="/assets/images/twitter_icon.png" alt="twitter_icon"></a>
                    </div>
                    <div class="flex-3">
                        <a href="#"><img src="/assets/images/instagram_icon.png" alt="instagram_icon"></a>
                    </div>
            </div>
        </div>
    </footer>
@yield('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script>
    const favicon = document.querySelector("#icon");

function updateFavicon(theme) {
  favicon.href = theme === "dark" ? "/assets/images/logo.png" : "/assets/images/logo-2.png";
}

window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change", function(e) {
  updateFavicon(e.matches ? "dark" : "light");
});
</script>
</body>
</html>