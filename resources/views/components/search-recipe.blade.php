
    <form action="{{route('recipes.recipe.search')}}" method="POST" class="flex flex-col gap-5">
        @csrf
        <h1 class="font-kanit font-semibold text-lg md:text-xl">Cautare rețetă</h1>
        @error('recipeId')
            <span class="text-red-600 font-kanit">{{$message}}</span>
        @enderror
        <input type="text"  placeholder="ID rețetă" name="recipeId" class="bg-transparent border-b-2 border-accent focus:border-none focus:outline-2 focus:outline-accentLight px-2 focus:rounded-md"
        onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" 
        >
        <button class="rounded-lg text-white shadow-xl bg-green-700 hover:bg-green-800 transition-colors px-2 py-1">Cautare</button>
    </form>