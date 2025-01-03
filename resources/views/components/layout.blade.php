<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Retzetovici</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/css/glide.core.min.css'])
    @vite(['resources/css/glide.theme.min.css'])
    @stack('scripts')
    
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
    <div id="slider" class="bg-gradient-to-b lg:hidden font-semibold from-accent to-accentLight w-0 absolute min-h-screen left-0 top-[100%] transition-all duration-500 z-10 ">
            <x-header-nav type='mobile'></x-header-nav>
    </div>
    <!--Normal navigation-->
    <nav class="mr-10 hidden lg:block font-semibold">
        <x-header-nav type='desktop'></x-header-nav>
    </nav>
</header>
<main class="w-full min-h-screen bg-gradient-to-tl from-background to-lightBlue-100">
    {{$slot}}
</main>
<footer>Footer</footer>