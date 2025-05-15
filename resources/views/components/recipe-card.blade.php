<!--Card-->
<div
    class="flex max-w-[500px] flex-col justify-between gap-8 rounded-[20px] bg-white px-5 py-4 font-kanit text-black shadow-xl"
>
    <!--Top content-->
    <div class="flex flex-col gap-6">
        <!--Top section-->
        <div class="flex flex-col gap-1">
            <span
                data-category="{{ $category }}"
                class="text-sm uppercase"
                id="category"
            >
                {{ $category }}
            </span>
            <img
                src="{{ asset($image) }}"
                alt="{{ $title }}"
                class="rounded-md"
                width="460px"
                height="260px"
            />
        </div>
        <!--Title and author-->
        <div class="flex flex-col">
            <h1 class="break-all text-lg font-semibold md:text-2xl">
                {{ $title }}
            </h1>
            <h3 class="text-[16px]">Postată de: {{ $username }}</h3>
        </div>
    </div>
    <!--Tags-->
    <div class="grid grid-cols-2 justify-evenly gap-2 md:flex md:gap-0">
        @foreach ($tags as $tag)
            <span
                data-tag="{{ $tag }}"
                class="rounded-xl bg-gradient-to-r from-accent to-accentLight px-3 py-1 text-center text-xs text-white shadow-lg sm:text-sm"
            >
                {{ $tag }}
            </span>
        @endforeach
    </div>

    <!--Main Content-->
    <div class="flex flex-col gap-8">
        <!--Difficulty | Duration | Published date-->
        <div class="flex justify-evenly text-sm font-semibold">
            <!--Dificulty-->
            <span class="flex items-center gap-1">
                <img
                    src="{{ url("/icons/recipe-card/badge-icon.svg") }}"
                    alt="Dificultate"
                    width="30"
                    height="30"
                    class="fill-black"
                />
                <p id="difficulty">{{ $difficulty }}</p>
            </span>
            <!--Duration-->
            <span class="flex items-center gap-1">
                <img
                    src="{{ url("/icons/recipe-card/clock-icon.svg") }}"
                    alt="Durata"
                    width="30"
                    height="30"
                    class="fill-black"
                />
                <p>{{ $duration }} min</p>
            </span>
            <!--Dificulty-->
            <span class="flex items-center gap-1">
                <img
                    src="{{ url("/icons/recipe-card/calendar-icon.svg") }}"
                    alt="Data publicarii"
                    width="30"
                    height="30"
                    class="fill-black"
                />
                <p>{{ $date }}</p>
            </span>
        </div>
        <!--Ingredients-->
        <div class="flex flex-col justify-center gap-1 text-sm">
            <p class="font-semibold">Ingrediente</p>
            @foreach ($ingredients as $ingredient)
                <p class="break-all">{{ $ingredient }}</p>
            @endforeach
        </div>
    </div>

    <!--Bottom section (stats and action button)-->
    <div class="flex w-full justify-between">
        <!--Left section (views and likes)-->
        <div class="flex gap-5">
            <!--Views-->
            <span class="flex items-center gap-1">
                <img
                    src="{{ url("/icons/recipe-card/view-icon.svg") }}"
                    alt="Vizualizari"
                    width="25"
                    height="25"
                    class="fill-black"
                />
                <p>{{ $views }}</p>
            </span>
            <!--Likes-->
            <span class="flex items-center gap-1">
                <img
                    src="{{ url("/icons/recipe-card/like-icon.svg") }}"
                    alt="Aprecieri"
                    width="25"
                    height="25"
                    class="fill-black"
                />
                <p>{{ $likes }}</p>
            </span>
        </div>
        <form
            action="{{ route("recipes.recipe", ["recipeId" => $id]) }}"
            method="GET"
        >
            <button
                type="submit"
                class="rounded-xl bg-gradient-to-b from-accentLight to-accent px-2 py-1 text-white shadow-xl transition-colors hover:from-orange-700 hover:to-red-700"
            >
                Vezi rețeta
            </button>
        </form>
    </div>
</div>
@push("scripts")
    @vite("resources/js/format-tag.js")
    @vite("resources/js/format-category.js")
    @vite("resources/js/format-difficulty.js")
@endpush
