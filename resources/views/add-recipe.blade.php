<x-layout>

    <div class="w-full flex flex-col pt-10 items-center">
        <h1 class="text-xl md:text-3xl text-black font-quicksand font-semibold">Adaugă rețetă</h1>

        <form action="{{route('create-recipe')}}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-14 pt-10 ">
            @csrf
            @session('success')
                <span class="text-lg text-green-600">{{session('success')}}</span>
            @endsession
            <!--Recipe title-->
            <div class="flex flex-col items-start gap-2">
                <label for="title" class="text-sm md:text-base">Titlu</label>

                @error('title')
                <span class="text-sm text-red-600">{{$message}}</span>
                @enderror

                <input type="text" name="title" class="px-2 py-1 rounded-lg bg-white text-black shadow xl border-2 @error('title') border-red-600 @enderror">
            </div>
            <!--Recipe description-->
            <div class="flex flex-col items-start gap-2">
                <label for="description" class="text-sm md:text-base">Descriere</label>

                @error('description')
                <span class="text-sm text-red-600">{{$message}}</span>
                @enderror

                <textarea name="description"  cols="30" rows="7" class="px-2 py-1 rounded-lg bg-white text-black shadow xl @error('description') border-2 border-red-600 @enderror" required></textarea>
            </div>

            <!--Recipe category-->
            <div class="flex flex-col items-start gap-2">

                @error('category')
                <span class="text-sm text-red-600">{{$message}}</span>
                @enderror

                <label for="category" class="text-sm md:text-base">Categorie</label>
                <select name="category" class="px-2 py-1 rounded-lg bg-white text-black @error('category') border-2 border-red-600 @enderror">
                    <option value="fast_recipes">Rețete rapide</option>
                    <option value="fasting_recipes">Rețete de post</option>
                    <option value="international_recipes">Rețete internaționale</option>
                    <option value="traditional_recipes">Rețete tradiționale</option>
                    <option value="vegan_recipes">Rețete vegetariene/vegane</option>
                    <option value="maincourse_recipes">Feluri principale</option>
                    <option value="pizza_pasta_recipes">Pizza și paste</option>
                    <option value="soup_recipes">Supe și ciorbe</option>
                    <option value="fish_recipes">Pește și fructe de mare</option>
                    <option value="dessert_recipes">Deserturi</option>
                </select>
            </div>

            <!--Recipe ingredients-->
            <div class="flex flex-col items-start gap-2">
                <label for="ingredients" class="text-sm md:text-base">Ingrediente</label>

                @error('ingredients')
                <span class="text-sm text-red-600">{{$message}}</span>
                @enderror

                <input type="text" name="ingredients[] " placeholder="Ingredinet 1" class="px-2 py-1 rounded-lg bg-white text-black shadow xl placeholder:text-gray-400 @error('ingredients') border-2 border-red-600 @enderror" required>
                        <section id="ingredients" class="flex flex-col gap-3">
                        </section>
                <button type="button" id="add-ingredient" class="text-white bg-purple-700 hover:bg-purple-800 transition-colors px-2 py-1 shadow-xl rounded-lg">Adaugă ingredient</button>
            </div>
            <!--Preparation steps-->
            <div class="flex flex-col items-start gap-2">
                <h1 class="text-sm md:text-base">Mod de preparare (pas cu pas)</h1>
                <label for="steps[]" class="text-sm md:text-base font-semibold underline">Pasul #1</label>

                @error('steps')
                <span class="text-sm text-red-600">{{$message}}</span>
                @enderror

                <textarea name="steps[]"  cols="30" rows="7" class="px-2 py-1 rounded-lg bg-white text-black shadow xl @error('steps') border-2 border-red-600 @enderror" required></textarea>

                <section id="preparation-steps" class="flex flex-col gap-3">
                
                </section>
                <button type="button" id="add-step" class="text-white bg-purple-700 hover:bg-purple-800 transition-colors px-2 py-1 shadow-xl rounded-lg">Adaugă pași</button>
            </div>
            <!--Recipe duration-->
            <div class="flex flex-col items-start gap-2">
                <label for="duration" class="text-sm md:text-base">Timp de preparare (minute)</label>

                @error('duration')
                <span class="text-sm text-red-600">{{$message}}</span>
                @enderror

                <input type="number" name="duration" class="px-2 py-1 rounded-lg bg-white text-black shadow xl" @error('duration') border-2 border-red-600 @enderror>
            </div>
            <!--Difficulty-->
            <div class="flex flex-col items-start gap-2">
                <label for="difficulty" class="text-sm md:text-base">Dificultate</label>

                @error('difficulty')
                <span class="text-sm text-red-600">{{$message}}</span>
                @enderror

                <div class="flex gap-5">

                        <!--Easy-->
                        <div class="flex gap-1">
                            <input type="radio" id="easy" name="difficulty" value="easy" checked="checked" >
                            <label for="difficulty">Ușoară</label>
                        </div>
                        <!--Medium-->
                        <div class="flex gap-1">
                            <input type="radio" name="difficulty" value="medium">
                            <label for="difficulty">Medie</label>
                        </div>
                        <!--Hard-->
                        <div class="flex gap-1">
                            <input type="radio" name="difficulty" value="difficult">
                        <label for="difficulty">Dificilă</label>
                    </div>
                </div>
                  
            </div>
            <!--Image-->
            <div id="image-div" class="flex flex-col items-start gap-2">

                @error('image')
                <span class="text-sm text-red-600">{{$message}}</span>
                @enderror

                <label for="image">Imagine</label>
                <button type="button" id="button" class="rounded-md border-none block bg-purple-700 hover:bg-purple-800 transition-colors px-2 text-white py-1 shadow-xl cursor-pointer">Alege o imagine</button>
                <label for="image" id="label"></label>
                <input type="file" tabindex="-1" id="file" name="image" placeholder="Alege o imagine sugestiva" class="hidden" >
            </div>
    
            <!--Tags-->
            <div class="flex flex-col items-start gap-2">
                <label for="tags[]">Etichete</label>

                @error('tags')
                <span class="text-sm text-red-600">{{$message}}</span>
                @enderror

                <div class="flex flex-col gap-2">
                    <label for="tag[]" class="font-semibold underline text-black">Eticheta 1</label>
                    <select type="text" name="tags[]" placeholder="Eticheta 1" class="px-2 py-1 rounded-lg bg-white text-black shadow xl placeholder:text-gray-400 @error('tags') border-2 border-red-600 @enderror" required>
                        <option value="appetizer">Aperitiv</option>
                        <option value="salad">Salată</option>
                        <option value="snack">Gustare</option>
                        <option value="breakfast">Mic Dejun</option>
                        <option value="lunch">Prânz</option>
                        <option value="dinner">Cină</option>
                        <option value="vegan">Vegan</option>
                        <option value="gluten_free">Fără Gluten</option>
                        <option value="keto">Keto</option>
                        <option value="paleo">Paleo</option>
                        <option value="low_carb">Low Carb</option>
                        <option value="high_protein">High Protein</option>
                        <option value="grill">Grătar</option>
                        <option value="baked">Copt</option>
                        <option value="seafood">Fructe de Mare</option>
                        <option value="dessert">Desert</option>
                        <option value="drink">Băutură</option>
                        <option value="soup">Supă</option>
                        <option value="stew">Tocană</option>
                        <option value="bread">Pâine</option>
                        <option value="pastry">Patiserie</option>
                        <option value="pasta">Paste</option>
                        <option value="rice">Orez</option>
                        <option value="comfort_food">Comfort Food</option>
                        <option value="spicy">Picant</option>
                        <option value="sweet">Dulce</option>
                        <option value="sour">Acru</option>
                        <option value="quick">Rapid</option>
                        <option value="healthy">Sănătos</option>
                        <option value="budget_friendly">Economic</option>
                        <option value="holiday">Sărbători</option>
                        <option value="christmas">Crăciun</option>
                        <option value="easter">Paște</option>
                        <option value="valentines">Valentine's Day</option>
                        <option value="bbq">BBQ</option>
                        <option value="asian">Asiatic</option>
                        <option value="italian">Italian</option>
                        <option value="mexican">Mexican</option>
                        <option value="indian">Indian</option>
                        <option value="mediterranean">Mediterranean</option>
                        <option value="fusion">Fusion</option>
                    </select>
                </div>
                <section id="tags" class="flex flex-col gap-5">
                </section>
                <button type="button" id="add-tag" class="text-white bg-purple-700 hover:bg-purple-800 transition-colors px-2 py-1 shadow-xl rounded-lg">Adaugă etichete</button>
            </div>
            <button  type="submit" class="md:text-lg px-2 py-1 rounded-lg bg-gradient-to-r from-accentLight to-accent text-white font-semibold hover:bg-red-700 hover:scale-105 transition-all">Confirmă</button>
        </form>
    </div>

    @push('scripts')
        @vite('resources/js/ingredients.js')        
        @vite('resources/js/preparation-steps.js')    
        @vite('resources/js/recipe-tags.js')    
        @vite('resources/js/file-input.js')    
    @endpush
</x-layout>
