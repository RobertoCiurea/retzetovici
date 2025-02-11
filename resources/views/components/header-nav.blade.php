
    <ul @if ($type==='mobile')
        id="list"
    @endif  
    class="{{$type=== 'mobile' ?'hidden flex-col items-center  justify-center gap-5' :'flex justify-center gap-5'}}">
        <li class="text-xl text-background drop-shadow-xl flex flex-col group">
            <form action="/add-recipe" method="GET">
                <button type="submit">Adaugă rețetă nouă</button>
                <span class="w-0 group-hover:w-full block bg-background h-[2px] shadow-xl transition-all duration-500"></span>
            </form>
        </li>
        <li class="text-xl text-background drop-shadow-xl flex flex-col group">
            <form action="{{route('recipes.popular-recipes')}}">
                <button type="submit" id="popular-recipes-button">
                    Explorează rețete populare
                </button> 
                <span class="w-0 group-hover:w-full block bg-background h-[2px] shadow-xl transition-all duration-500"></span>
            </form>
            </li>
        <li class="text-xl cursor-pointer text-background drop-shadow-xl flex flex-col group">
            <form action="{{route('categories')}}">
                <button type="submit" id="categories-button">
                    Categorii
                </button>
                <span class="w-0 group-hover:w-full block bg-background h-[2px] shadow-xl transition-all duration-500"></span>
            </form>
            </li>
        <li class="text-xl text-background drop-shadow-xl flex flex-col group">
            <form action="/account-details" method="GET">
                <button type="submit">Contul meu</button>
                <span class="w-0 group-hover:w-full block bg-background h-[2px] shadow-xl transition-all duration-500"></span>
            </form>
            </li>
    </ul>
