<!--Card-->
<div class="flex flex-col bg-white text-black py-4 px-5 shadow-xl rounded-[20px] font-kanit gap-8">
    <!--Top content-->
    <div class="flex flex-col gap-6">
        <!--Top section-->
        <div class="flex flex-col gap-1">
            <span class="text-sm uppercase" id="category" >{{$category}}</span>
            <img src="{{$image}}" alt="{{$title}}" class="rounded-md">
        </div>
        <!--Title and author-->
        <div class="flex flex-col">
            <h1 class="font-semibold text-2xl">{{$title}}</h1>
            <h3 class="text-[16px]">Postată de: {{$username}}</h3>  
        </div>
    </div>
    <!--Tags-->
    <div class="flex justify-evenly ">
        @foreach ($tags as $tag)
        <span id="tag" class="text-sm bg-gradient-to-r rounded-xl text-white from-accent to-accentLight px-3 py-1 shadow-lg">{{$tag}}</span>
        @endforeach
    </div>

    <!--Main Content-->
    <div class="flex flex-col gap-8">
        <!--Difficulty | Duration | Published date-->
        <div class="flex justify-evenly font-semibold text-sm">
            <!--Dificulty-->
            <span class="flex gap-1 items-center">
                <img src="{{url('/icons/recipe-card/badge-icon.svg')}}" alt="Dificultate" width="30" height="30" class="fill-black">
                <p id="difficulty">{{$difficulty}}</p>
            </span>
            <!--Duration-->
            <span class="flex gap-1 items-center">
                <img src="{{url('/icons/recipe-card/clock-icon.svg')}}" alt="Durata" width="30" height="30" class="fill-black">
                <p>{{$duration}} min</p>
            </span>
            <!--Dificulty-->
            <span class="flex gap-1 items-center">
                <img src="{{url('/icons/recipe-card/calendar-icon.svg')}}" alt="Data publicarii" width="30" height="30" class="fill-black">
                <p>{{$date}}</p>
            </span>
        </div>
        <!--Ingredients-->
        <div class="flex justify-center gap-3 text-sm">
            <p class="font-semibold">Ingrediente</p>
            @foreach ($ingredients as $ingredient)
                <p>{{$ingredient}}</p>
            @endforeach
        </div>
    </div>
    
    <!--Bottom section (stats and action button)-->
    <div class="flex justify-between w-full">
        <!--Left section (views and likes)-->
        <div class="flex gap-5">
            <!--Views-->
            <span class="flex gap-1 items-center">
                <img src="{{url('/icons/recipe-card/view-icon.svg')}}" alt="Vizualizari" width="25" height="25" class="fill-black">
                <p>{{$views}}</p>
            </span>
            <!--Likes-->
            <span class="flex gap-1 items-center">
                <img src="{{url('/icons/recipe-card/like-icon.svg')}}" alt="Aprecieri" width="25" height="25" class="fill-black">
                <p>{{$likes}}</p>
            </span>
        </div>
        <form action="" method="GET">
            <button type="submit" class="bg-gradient-to-b from-accentLight to-accent text-white hover:from-orange-700 hover:to-red-700 shadow-xl transition-colors py-1 px-2 rounded-xl">Vezi rețeta</button>
        </form>
    </div>
</div>
@push('scripts')
    @vite("resources/js/format-tag.js")
    @vite("resources/js/format-category.js")
    @vite("resources/js/format-difficulty.js")
@endpush
