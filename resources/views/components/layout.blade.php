<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Retzetovici</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    
</body>
</html>
<header class="w-full relative flex justify-between items-center px-3 py-2 bg-gradient-to-t font-kanit gradie from-accent to-accentLight">
    <a href="/">
        <img src="{{url('/images/logo.png')}}" alt="Logo" width="200" height="200">
    </a>
    <!--Hamburger menu (mobile only)-->
    <div class="flex flex-col lg:hidden gap-2 w-[50px] h-[100px] cursor-pointer group translate-y-7" id="hamburger">
        <span class="top w-full bg-background h-[3px] group-hover:bg-gray-300 transition-all duration-300" id="line"></span>
        <span class="middle w-full bg-background h-[3px] group-hover:bg-gray-300 transition-all duration-300" id="line"></span>
        <span class="bottom w-full bg-background h-[3px] group-hover:bg-gray-300 transition-all duration-300" id="line"></span>
 
    </div>
    <!--hamburger slide menu-->
    <div id="slider" class="bg-gradient-to-b lg:hidden from-accent to-accentLight w-0 absolute min-h-screen left-0 top-[100%] transition-all duration-500 z-10 ">
        <ul id="list" class="hidden flex-col items-center  justify-center gap-5">
            <li class="text-xl text-background drop-shadow-xl flex flex-col group">
                <a href="#"> Adauga reteta noua</a>
                <span class="w-0 group-hover:w-full block bg-background h-[2px] shadow-xl transition-all duration-500"></span>
            </li>
            <li class="text-xl text-background drop-shadow-xl flex flex-col group">
                <a href="#"> Exploreaza retete populare</a>
                <span class="w-0 group-hover:w-full block bg-background h-[2px] shadow-xl transition-all duration-500"></span>
                </li>
            <li class="text-xl text-background drop-shadow-xl flex flex-col group">
                <a href="#"> Categorii</a>
                <span class="w-0 group-hover:w-full block bg-background h-[2px] shadow-xl transition-all duration-500"></span>
                </li>
            <li class="text-xl text-background drop-shadow-xl flex flex-col group">
                <a href="#"> Contul meu</a>
                <span class="w-0 group-hover:w-full block bg-background h-[2px] shadow-xl transition-all duration-500"></span>
                </li>
        </ul>
    </div>
    <!--Normal navigation-->
    <nav class="mr-10 hidden lg:block">
        <ul class="flex justify-center gap-5">
            <li class="text-lg xl:text-xl text-background drop-shadow-xl flex flex-col group">
                <a href="#"> Adauga reteta noua</a>
                <span class="w-0 group-hover:w-full block bg-background h-[2px] shadow-xl transition-all duration-500"></span>
            </li>
            <li class="text-lg xl:text-xl text-background drop-shadow-xl flex flex-col group">
                <a href="#"> Exploreaza retete populare</a>
                <span class="w-0 group-hover:w-full block bg-background h-[2px] shadow-xl transition-all duration-500"></span>
                </li>
            <li class="text-lg xl:text-xl text-background drop-shadow-xl flex flex-col group">
                <a href="#"> Categorii</a>
                <span class="w-0 group-hover:w-full block bg-background h-[2px] shadow-xl transition-all duration-500"></span>
                </li>
            <li class="text-lg xl:text-xl text-background drop-shadow-xl flex flex-col group">
                <a href="#"> Contul meu</a>
                <span class="w-0 group-hover:w-full block bg-background h-[2px] shadow-xl transition-all duration-500"></span>
                </li>
        </ul>
    </nav>
</header>
<main class="w-full min-h-screen bg-gradient-to-tl from-background to-lightBlue-100">
    {{$slot}}
</main>
<footer>Footer</footer>