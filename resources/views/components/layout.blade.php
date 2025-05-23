<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta
            name="description"
            content="Retzetovici: Blogul tau preferat de retete culinare!"
        />
        <title>Retzetovici</title>
        @vite(["resources/css/app.css", "resources/js/app.js"])
        @stack("scripts")
    </head>
    <body></body>
</html>
<header
    class="relative flex w-full items-center justify-between bg-gradient-to-t from-accent to-accentLight px-3 py-2 font-kanit"
>
    <a href="/">
        <img
            src="{{ url("/images/logo.png") }}"
            alt="Logo"
            width="200"
            height="200"
        />
    </a>
    <!--Hamburger menu (mobile only)-->
    <div
        class="group flex h-[100px] w-[50px] translate-y-7 cursor-pointer flex-col gap-2 lg:hidden"
        id="hamburger"
    >
        <span
            class="top h-[3px] w-full bg-background transition-all duration-300 group-hover:bg-gray-300"
            id="line"
        ></span>
        <span
            class="middle h-[3px] w-full bg-background transition-all duration-300 group-hover:bg-gray-300"
            id="line"
        ></span>
        <span
            class="bottom h-[3px] w-full bg-background transition-all duration-300 group-hover:bg-gray-300"
            id="line"
        ></span>
    </div>
    <!--hamburger slide menu-->
    <div
        id="slider"
        class="absolute left-0 top-[100%] z-10 min-h-screen w-0 bg-gradient-to-b from-accent to-accentLight font-semibold transition-all duration-500 lg:hidden"
    >
        <x-header-nav type="mobile"></x-header-nav>
    </div>
    <!--Normal navigation-->
    <nav class="mr-10 hidden font-semibold lg:block">
        <x-header-nav type="desktop"></x-header-nav>
    </nav>
</header>
<main
    class="min-h-screen w-full bg-gradient-to-tl from-background to-lightBlue-100 pb-20"
>
    {{ $slot }}
</main>
<footer
    class="flex w-full flex-col items-center justify-between bg-gradient-to-b from-accentLight to-accent px-5 font-quicksand text-white"
>
    <!--Logo + newsletter-->
    <section
        class="flex w-full flex-col items-center justify-around lg:flex-row"
    >
        <img
            src="{{ url("/images/logo.png") }}"
            alt="Logo"
            class="w-[200px] sm:w-[250px] lg:w-[300px]"
        />
        <!--newsletter form-->
        <form
            action="{{ route("newsletter") }}"
            method="POST"
            class="mt-5 flex flex-col"
        >
            @csrf
            <h1 class="text-2xl font-semibold sm:text-[32px] sm:leading-[120%]">
                Abonează-te la
                <br />
                <span class="text-black">Newsletter</span>
            </h1>
            <!--Custom input-->
            @error("email")
                <span class="text-sm text-yellow-500 sm:text-base">
                    {{ $message }}
                </span>
            @enderror

            @session("newsletter_success")
                <span class="text-sm text-green-600 sm:text-base">
                    {{ session("newsletter_success") }}
                </span>
            @endsession

            <div
                class="mt-3 flex gap-2 rounded-lg bg-white px-3 py-1 text-black focus-within:border-2 focus-within:border-black"
            >
                <input
                    type="email"
                    name="email"
                    class="bg-transparent px-2 focus:outline-none"
                    placeholder="Email-ul tău..."
                />
                <button type="submit" class="w-[30px] -rotate-12">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        xml:space="preserve"
                        class="fill-[#374151] transition-all hover:fill-black"
                        enable-background="new 0 0 24 24"
                    >
                        <path
                            d="m21.5 11.1-17.9-9c-.9-.4-1.9.4-1.5 1.3l2.5 6.7L16 12 4.6 13.9l-2.5 6.7c-.3.9.6 1.7 1.5 1.2l17.9-9c.7-.3.7-1.3 0-1.7z"
                        />
                    </svg>
                </button>
            </div>
        </form>
    </section>
    <!--Menu and socials-->
    <section
        class="mt-10 flex w-full justify-around sm:justify-center sm:gap-10 md:gap-16"
    >
        <!--Facebook icon-->
        <svg
            class="w-[35px] cursor-pointer fill-white transition-all hover:-translate-y-2 hover:fill-black"
            viewBox="0 0 512 512"
            xml:space="preserve"
            xmlns="http://www.w3.org/2000/svg"
            fill-rule="evenodd"
            clip-rule="evenodd"
            stroke-linejoin="round"
            stroke-miterlimit="2"
        >
            <path
                d="M512 257.555c0-141.385-114.615-256-256-256S0 116.17 0 257.555c0 127.777 93.616 233.685 216 252.89v-178.89h-65v-74h65v-56.4c0-64.16 38.219-99.6 96.695-99.6 28.009 0 57.305 5 57.305 5v63h-32.281c-31.801 0-41.719 19.733-41.719 39.978v48.022h71l-11.35 74H296v178.89c122.385-19.205 216-125.113 216-252.89Z"
                fill-rule="nonzero"
            ></path>
        </svg>
        <!--Instagram icon-->
        <svg
            class="w-[35px] cursor-pointer fill-white transition-all hover:-translate-y-2 hover:fill-black"
            viewBox="0 0 128 128"
            xml:space="preserve"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path
                clip-rule="evenodd"
                fill="none"
                fill-rule="evenodd"
                d="M0 0h128v128H0z"
            ></path>
            <radialGradient
                cx="19.111"
                cy="128.444"
                gradientUnits="userSpaceOnUse"
                id="a"
                r="163.552"
            >
                <stop
                    offset="0"
                    stop-color="#ffffff"
                    class="stop-color-ffb140"
                ></stop>
                <stop
                    offset=".256"
                    stop-color="#ffffff"
                    class="stop-color-ff5445"
                ></stop>
                <stop
                    offset=".599"
                    stop-color="#ffffff"
                    class="stop-color-fc2b82"
                ></stop>
                <stop
                    offset="1"
                    stop-color="#ffffff"
                    class="stop-color-8e40b7"
                ></stop>
            </radialGradient>
            <path
                clip-rule="evenodd"
                d="M105.843 29.837a7.68 7.68 0 1 1-15.36 0 7.68 7.68 0 0 1 15.36 0zM64 85.333c-11.782 0-21.333-9.551-21.333-21.333 0-11.782 9.551-21.333 21.333-21.333 11.782 0 21.333 9.551 21.333 21.333 0 11.782-9.551 21.333-21.333 21.333zm0-54.198c-18.151 0-32.865 14.714-32.865 32.865 0 18.151 14.714 32.865 32.865 32.865 18.151 0 32.865-14.714 32.865-32.865 0-18.151-14.714-32.865-32.865-32.865zm0-19.603c17.089 0 19.113.065 25.861.373 6.24.285 9.629 1.327 11.884 2.204 2.987 1.161 5.119 2.548 7.359 4.788 2.24 2.239 3.627 4.371 4.788 7.359.876 2.255 1.919 5.644 2.204 11.884.308 6.749.373 8.773.373 25.862s-.065 19.113-.373 25.861c-.285 6.24-1.327 9.629-2.204 11.884-1.161 2.987-2.548 5.119-4.788 7.359-2.239 2.24-4.371 3.627-7.359 4.788-2.255.876-5.644 1.919-11.884 2.204-6.748.308-8.772.373-25.861.373-17.09 0-19.114-.065-25.862-.373-6.24-.285-9.629-1.327-11.884-2.204-2.987-1.161-5.119-2.548-7.359-4.788-2.239-2.239-3.627-4.371-4.788-7.359-.876-2.255-1.919-5.644-2.204-11.884-.308-6.749-.373-8.773-.373-25.861 0-17.089.065-19.113.373-25.862.285-6.24 1.327-9.629 2.204-11.884 1.161-2.987 2.548-5.119 4.788-7.359 2.239-2.24 4.371-3.627 7.359-4.788 2.255-.876 5.644-1.919 11.884-2.204 6.749-.308 8.773-.373 25.862-.373zM64 0C46.619 0 44.439.074 37.613.385 30.801.696 26.148 1.778 22.078 3.36c-4.209 1.635-7.778 3.824-11.336 7.382C7.184 14.3 4.995 17.869 3.36 22.078 1.778 26.149.696 30.801.385 37.613.074 44.439 0 46.619 0 64s.074 19.561.385 26.387c.311 6.812 1.393 11.464 2.975 15.535 1.635 4.209 3.824 7.778 7.382 11.336 3.558 3.558 7.127 5.746 11.336 7.382 4.071 1.582 8.723 2.664 15.535 2.975 6.826.311 9.006.385 26.387.385s19.561-.074 26.387-.385c6.812-.311 11.464-1.393 15.535-2.975 4.209-1.636 7.778-3.824 11.336-7.382 3.558-3.558 5.746-7.127 7.382-11.336 1.582-4.071 2.664-8.723 2.975-15.535.311-6.826.385-9.006.385-26.387s-.074-19.561-.385-26.387c-.311-6.812-1.393-11.464-2.975-15.535-1.636-4.209-3.824-7.778-7.382-11.336-3.558-3.558-7.127-5.746-11.336-7.382C101.851 1.778 97.199.696 90.387.385 83.561.074 81.381 0 64 0z"
            ></path>
        </svg>
        <!--Twitter icon-->
        <svg
            class="w-[35px] cursor-pointer fill-white transition-all hover:-translate-y-2 hover:fill-black"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 1200 1227"
            fill="none"
        >
            <g clip-path="url(#a)">
                <path
                    d="M714.163 519.284 1160.89 0h-105.86L667.137 450.887 357.328 0H0l468.492 681.821L0 1226.37h105.866l409.625-476.152 327.181 476.152H1200L714.137 519.284h.026ZM569.165 687.828l-47.468-67.894-377.686-540.24h162.604l304.797 435.991 47.468 67.894 396.2 566.721H892.476L569.165 687.854v-.026Z"
                ></path>
            </g>
            <defs>
                <clipPath id="a"><path d="M0 0h1200v1227H0z"></path></clipPath>
            </defs>
        </svg>
    </section>

    <!--Menu section-->
    <section
        class="mt-10 flex w-full flex-col items-center gap-2 font-semibold sm:flex-row sm:justify-around sm:gap-0 sm:px-5 sm:text-lg sm:font-normal md:mt-5 md:text-xl lg:mt-2"
    >
        <!--Left section-->
        <ul class="flex flex-col gap-2 pl-5 sm:pl-0">
            <li class="transition-all hover:translate-x-2 hover:text-gray-400">
                <a href="/terms-and-conditions">Termeni și condiții</a>
            </li>
            <li class="transition-all hover:translate-x-2 hover:text-gray-400">
                <a href="/cookie-policy">Politica cookies</a>
            </li>
            <li class="transition-all hover:translate-x-2 hover:text-gray-400">
                <a href="/privacy-policy">Politica de confidențialitate</a>
            </li>
        </ul>
        <!--Right section-->
        <ul class="flex flex-col gap-2 text-start">
            <li class="transition-all hover:translate-x-2 hover:text-gray-400">
                <a href="/about-us">Despre noi</a>
            </li>
            <li class="transition-all hover:translate-x-2 hover:text-gray-400">
                <a href="/contact">Contactează-ne</a>
            </li>
            <li class="transition-all hover:translate-x-2 hover:text-gray-400">
                <a href="/report-problem">Raportează o problema</a>
            </li>
        </ul>
    </section>
    <!--Copyright message-->
    <section class="mt-10 flex w-full justify-center">
        Copyright © Retzetovici 2025. Toate drepturile rezervate
    </section>
</footer>
