<div class="flex justify-evenly w-full">
<x-modal :openButton="'Filtre'" :openButtonStyles="''">
<form action="{{url()->current()}}" method="GET" class="flex flex-col items-start">
    <h1 class="font-quicksand text-lg md:text-xl">Filtre</h1>
    <!--Filters-->
    <div class="flex flex-col mt-5 text-sm md:text-base">
        <div class="flex flex-col items-start gap-2">

            <!--Category-->
            <label for="category" class="text-sm md:text-base">Categorie</label>
            <select name="category" class="px-2 py-1 rounded-lg bg-white text-black border-2 border-gray-400 focus:border-gray-700">
                <option value="" {{ request('category') == '' ? 'selected' : '' }}>Toate</option>
                <option value="popular_recipes" {{ request('category') == 'popular-recipes' ? 'selected' : '' }}>Rețete populare</option>
                <option value="fast_recipes" {{ request('category') == 'fast-recipes' ? 'selected' : '' }}>Rețete rapide</option>
                <option value="fasting_recipes"{{ request('category') == 'fasting-recipes' ? 'selected' : '' }}>Rețete de post</option>
                <option value="international_recipes" {{ request('category') == 'international-recipes' ? 'selected' : '' }}>Rețete internaționale</option>
                <option value="traditional_recipes" {{ request('category') == 'traditional-recipes' ? 'selected' : '' }}>Rețete tradiționale</option>
                <option value="vegan_recipes" {{ request('category') == 'vegan-recipes' ? 'selected' : '' }}>Rețete vegetariene/vegane</option>
                <option value="maincourse_recipes" {{ request('category') == 'maincourse-recipes' ? 'selected' : '' }}>Feluri principale</option>
                <option value="pizza_pasta_recipes" {{ request('category') == 'pizza-pasta-recipes' ? 'selected' : '' }}>Pizza și paste</option>
                <option value="soup_recipes" {{ request('category') == 'soup-recipes' ? 'selected' : '' }}>Supe și ciorbe</option>
                <option value="fish_recipes" {{ request('category') == 'fish-recipes' ? 'selected' : '' }}>Pește și fructe de mare</option>
                <option value="dessert_recipes"{{ request('category') == 'dessert-recipes' ? 'selected' : '' }}>Deserturi</option>
            </select>
        </div>

     <!--Difficulty-->
        <div class="flex flex-col items-start gap-2 mt-5">
            <label for="difficulty" class="text-sm md:text-base">Dificultate</label>
                @error('difficulty')
                <span class="text-sm text-red-600">{{$message}}</span>
            @enderror
            <select name="difficulty" class="px-2 py-1 rounded-lg bg-white w-full text-black border-2 border-gray-400 focus:border-gray-700">
                <option value="" {{ request('difficulty') == '' ? 'selected' : '' }}>Toate</option>
                <option value="easy" {{ request('difficulty') == 'easy' ? 'selected' : '' }}>Ușoară</option>
                <option value="medium" {{ request('difficulty') == 'medium' ? 'selected' : '' }}>Medie</option>
                <option value="difficult"  {{ request('difficulty') == 'difficult' ? 'selected' : '' }}>Dificilă</option>
            
            </select>
        </div>
     <!--Preparation time-->
        <div class="flex flex-col items-start gap-2 mt-5">
            <label for="duration" class="text-sm md:text-base">Timp de preparare</label>
                @error('duration')
                <span class="text-sm text-red-600">{{$message}}</span>
            @enderror
            <select name="duration" class="px-2 py-1 rounded-lg bg-white w-full text-black border-2 border-gray-400 focus:border-gray-700">
                <option value="" {{ request('duration') == '' ? 'selected' : '' }}>Oricât</option>
                <option value="less-one-hour" {{ request('duration') == 'less-one-hour' ? 'selected' : '' }}>Mai puțin de 1 oră</option>
                <option value="less-two-hours" {{ request('duration') == 'less-two-hours' ? 'selected' : '' }}>Mai puțin de 2 ore</option>
                <option value="less-three-hours" {{ request('duration') == 'less-three-hours' ? 'selected' : '' }}>Mai puțin de 3 ore</option>
                <option value="more-three-hours" {{ request('duration') == 'more-three-hours' ? 'selected' : '' }}>Mai mult de 3 ore</option>
            </select>
        </div>
        <!--Input for sort (keeping the same sort methods even when the filters are changed)-->
        <input type="hidden" name="sort" value="{{ request('sort') }}">
    
        <button type="submit" class="px-2 py-1 bg-purple-600 hover:bg-purple-700 mt-10 text-white rounded-md transition-colors shadow-xl">Aplică filtre</button>
    </div>
</form>
</x-modal>
    <form action="{{url()->current()}}" method="GET">
        <!--Input for filters (keeping the same filters even when the sort methods are changed)-->
        <input type="hidden" name="difficulty" value="{{ request('difficulty') }}">
        <input type="hidden" name="duration" value="{{ request('duration') }}">

        <div class="flex group items-center cursor-pointer">
            <select
            onchange="this.form.submit()"
            name="sort" class="bg-transparent border-none cursor-pointer group-hover:text-purple-600 group-focus:text-purple-600 focus:outline-none transition-colors appearance-none">
                <option class="text-black" value="most-popular" {{ request('sort') == 'most-popular' ? 'selected' : '' }}>Cele mai populare</option>
                <option class="text-black" value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Cele mai noi</option>
                <option class="text-black" value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Cele mai vechi</option>
                <option class="text-black" value="most-liked" {{ request('sort') == 'most-liked' ? 'selected' : '' }}>Cele mai apreciate</option>
            </select>
            <?xml version="1.0" ?><svg class="fill-black group-hover:fill-purple-600 group-focus:fill-purple-600 transition-colors w-[25px]" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z"/></svg>
        </div>
    </form>

</div>

