<x-layout>
    <div class="flex flex-col gap-5 mx-5 md:mx-10 lg:mx-20">

    <!---Top back-navigation system-->
        <div class="flex gap-3 pt-10 font-semibold">
            <a href="/" class="text-accent hover:text-red-800 transition-colors text-lg">Acasă</a>
            <img src="{{url('/icons/side-arrow-icon.svg')}}" alt="<" width="30px">
            <a href="/recipes" class="text-accent hover:text-red-800 transition-colors text-lg">Rețete</a>
            <img src="{{url('/icons/side-arrow-icon.svg')}}" alt="<" width="30px">
            <a href="/recipes/recipe/{{$recipe->id}}" class="text-red-800 font-bold transition-colors text-lg">{{$recipe->title}}</a>
            
        </div>
        <!--Content-->
            <div class="flex flex-col items-center">
                <!--Image and title-->
                <div class="flex flex-col items-center">
                    <img src="{{$recipe->image}}" alt="{{$recipe->title}}" class="md:min-w-[600px] lg:min-w-[800px] shadow-xl rounded-md">
                    <h1 class="text-xl md:text-2xl lg:text-3xl font-semibold">{{$recipe->title}}</h1>
                </div>

                <!--Recipe informations / stats-->
                <div class="flex items-center w-full justify-evenly">
                    <!--Left section-->
                    <div class="flex flex-col text-gray-500">
                        <span>Postată de: <span class="text-accentLight">{{$recipe->username}}</span></span>
                        <span>Postată pe: <span class="text-accentLight">{{$recipe->created_at->format('d.m.20y')}}</span></span>
                    </div>
                    <!--Right section-->
                    <div class="flex flex-col">
                        <span class="flex gap-3 items-center text-gray-500">
                            <img src="{{url('/icons/recipe-card/view-icon.svg')}}" alt="Vizualizari" width="30px">
                            <p>{{$recipe->views}}</p>
                        </span>
                        <span class="flex gap-3 text-gray-500 hover:text-gray-600 group">
                            <img src="{{url('/icons/recipe-card/like-icon.svg')}}" alt="Vizualizari" width="30px">
                            <p>{{$recipe->likes}}</p>
                        </span>
                    </div>
                </div>

                <!--Format category icon name-->
                @php
                    $categoryIcon = match ($recipe->category) {
                         'dessert_recipes'=> 'dessert-recipes-icon.svg',
                         'fasting_recipes'=>'fasting-recipes-icon.svg',
                         'fast_recipes'=>'fast-recipes-icon.svg',
                         'international-recipes'=>'international-recipes-icon.svg',
                         'traditional_recipes'=>'traditional-recipes-icon.svg',
                         'vegan_recipes'=>'vegan-recipes-icon.svg',
                         'maincourse_recipes'=>'main-course-recipes-icon.svg',
                         'pizza_pasta_recipes'=>'pizza-recipes-icon.svg',
                         'soup_recipes'=>'soup-recipes-icon.svg',
                         'fish_recipes'=>'fish-recipes-icon.svg',
                        
                    }
                @endphp
                <!--Status notifications-->
                        @session('delete-comment-success')
                        <span class="text-green-600 text-sm md:md:text-base">
                            {{session('delete-comment-success')}}
                        </span>
                        @endsession
                        @session('comment_success')
                        <span class="text-green-600 text-sm md:md:text-base">
                            {{session('comment_success')}}
                        </span>
                        @endsession

                <!--Recipe details -->
                <div class="grid grid-cols-1 rounded-md sm:grid-cols-3 mt-10 bg-accent justify-between px-5 py-3 text-white shadow-xl">
                     <!--Category-->
                     <div class="flex flex-col items-center gap-3 border-b-[1.5px] sm:border-b-0 sm:border-r-[1.5px] border-gray-100 py-5 sm:py-0 sm:px-10">
                        <img src="{{url('/icons/categories/' .$categoryIcon)}}" alt="Durata" width="75px">
                        <div class="flex items-center flex-col">
                            <h3 class="font-quicksand">Categorie</h3>
                            <p id="category" class="font-semibold font-kanit">{{$recipe->category}}</p>
                        </div>
                    </div>
                    <!--Duration-->
                    <div class="flex flex-col items-center gap-3 border-b-[1.5px] sm:border-b-0 sm:border-r-[1.5px] border-gray-100 py-3 sm:py-0 sm:px-10">
                        <img src="{{url('/icons/recipe-card/hourglass-icon.svg')}}" alt="Durata" width="75px">
                        <div class="flex items-center flex-col">
                            <h3 class="font-quicksand">Timp de pregătie</h3>
                            <p class="font-semibold font-kanit">{{$recipe->duration}} min</p>
                        </div>
                    </div>
                    <!--Difficulty-->
                    <div class="flex flex-col items-center gap-3 border-gray-100 py-5 sm:py-0 md:px-10">
                        <img src="{{url('/icons/recipe-card/difficulty-icon.svg')}}" class="" alt="Durata" width="75px">
                        <div class="flex items-center flex-col">
                            <h3 class="font-quicksand">Dificultate</h3>
                            <p id="difficulty" class="font-semibold font-kanit">{{$recipe->difficulty}}</p>
                        </div>
                    </div>
                </div>

                <!--Buttons-->
                <div class="flex flex-col items-center mt-10">
           
                    @session('success')
                    <span class="text-green-600 text-sm md:md:text-base">
                        {{session('success')}}
                    </span>
                    @endsession

                    @session('error')
                    <span class="text-red-600 text-sm md:text-base">
                        {{session('error')}}
                    </span>
                    @endsession

                    <div class="flex flex-col md:flex-row gap-3 md:gap-12 mt-6">
                        <!--Like form-->
                        <form action="{{route('recipes.recipe.like',["recipeId"=>$recipe->id] )}}" method="POST">
                            @csrf
                            <button class="flex items-center gap-2 text-white  px-3 py-2 rounded-md transition-colors shadow-xl
                            
                        {{$isLiked ? 'bg-red-700 hover:bg-red-800' : 'bg-accentLight hover:bg-red-500 '}}">
                        <!--If it's already appreciated add the fill version of svg-->
                        
                        <img src="{{url('/icons/appreciation-'.($isLiked ?'fill' :'nofill').'-icon.svg')}}" alt="Apreciere" width="30px">
                        <p class="font-semibold sm:text-lg">{{$isLiked ? "Apreciat" : "Apreciază" }}</p>
                    </button>
                </form>
                <!--Save form-->
                <form action="{{route('recipes.recipe.save',["recipeId"=>$recipe->id])}}" method="POST">
                    @csrf
                    <button class="flex items-center gap-2 text-white bg-accentLight px-3 py-2 rounded-md hover:bg-red-500 transition-colors shadow-xl
                    {{$isSaved ? 'bg-red-700 hover:bg-red-800' : 'bg-accentLight hover:bg-red-500 '}}
                    ">
                        <!--If it's already appreciated add the fill version of svg-->
                        <img src="{{url('/icons/favorite-'.($isSaved ?'fill' : 'nofill').'-icon.svg')}}" alt="Salvare" width="30px">
                        <p class="font-semibold sm:text-lg">{{$isSaved ? 'Salvat' : 'Salvează'}}</p>
                    </button>
                </form>
            </div>
        </div>

                <!--Description-->
                <p class="mt-14 font-kanit">{{$recipe->description}}</p>

                <!--Ingredients-->
                <div class="flex mt-5 flex-col font-kanit">
                    <h1 class="text-lg md:text-xl">Ingrediente</h1>
                    <ul class="flex mt-2 flex-col gap-3 pl-5 list-disc">
                        @foreach ($recipe->ingredients as $ingredient)
                            <li>{{$ingredient}}</li>
                        @endforeach
                    </ul>
                </div>

                <!--Preparation steps-->
                <div class="flex mt-5 flex-col font-kanit">
                    <h1 class="text-xl md:text-2xl">Pași de preparare</h1>
                    <ul class="flex mt-5 flex-col gap-5 pl-5">
                        @foreach ($recipe->steps as $step)
                            <li class="flex flex-col">
                                <span class="text-lg md:text-xl">Pasul #{{$loop->index+1}}</span>
                                <span class="ml-3">{{$step}}</span>

                            </li>
                        @endforeach
                    </ul>
                </div>

           <!--Comments section-->
                <div class="flex items-center gap-5 flex-col mt-20">
                    <h1 class=" text-lg md:text-xl lg:text-2xl font-quicksand">Comentarii ({{$recipe->comments_counter}}) <!--Add comments counter to recipe--></h1>
                    <!--foreach each comment-->
     
                    @foreach ($comments as $comment)
                    <div class="md:pl-10 flex flex-col gap-5 md:min-w-[400px] lg:max-w-[500px] max-w-[600px]">
                        <div class="flex flex-col gap-5 bg-white rounded-lg px-5 py-3 shadow-2xl">
                            <p class="text-sm md:text-base">{{$comment->message}}</p>
                            <!--Bottom info (name and date)-->
                            <div class="flex w-full justify-between">
                                <p>Creat de: <span class="font-semibold">{{$comment->username}}</span></p>
                                {{-- <p>Publicat pe: <span class="font-semibold">{{$comments->created_at->format('d.m.20y')}}</span></p> --}}
                            </div>
                        @auth
                        @if ($comment->user_id == Auth::user()->id || Auth::user()->role === 'moderator' || Auth::user()->role === 'admin')
                            
                        <form action="{{route('recipes.recipe.delete-comment', ['commentId'=>$comment->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white px-4 py-1 bg-accent hover:bg-red-700 rounded-xl transition-colors shadow-xl">Șterge</button>
                        </form>
                        @endif
                        @endauth
                        </div>
                    </div>
                    @endforeach
                    <!--Add comment form-->
                    @auth
                
                    <div class="flex flex-col gap-5 mt-10">   
                        <h1 class=" text-lg md:text-xl lg:text-2xl font-quicksand">Adaugă un comentariu </h1>
                        <form action="{{route('recipes.recipe.comment', ['recipeId'=>$recipe->id])}}" method="POST" class="flex flex-col gap-5 items-center">
                            @csrf
                            <input type="hidden" name="userId" value="{{auth()->user()->id}}">
                            @error('message')
                                <span class="text-red-600 text-sm sm:text-base">{{$message}}</span>
                            @enderror
                            <input type="hidden" name="username" value="{{auth()->user()->name}}">
                            <textarea name="message" placeholder="Mesajul tău" rows="5" class="min-w-[300px] md:min-w-[400px] lg:min-w-[500px] border-2 border-accentLight rounded-lg shadow-xl px-3 py-2"></textarea>
                            <button type="submit" class="bg-accentLight hover:bg-accent px-2 py-1 text-white rounded-lg shadow-xl">Adaugă comentariul</button>
                        </form>
                    </div>
                    @else
                    <h1 class="text-lg md:text-xl text-accent mt-10 transition-colors">Trebuie să fii autentificat pentru a adăuga un comentariu!</h1>
                    @endauth
                </div>
                @if (Auth::user()->role === 'admin')
                    <form action="{{route('recipes.recipe.delete', ['recipeId'=>$recipe->id])}}" method="POST" class="mt-10">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="userId" value="{{$recipe->user_id}}">
                        <button type="submit" class="text-white px-4 py-1 sm:text-lg bg-accent hover:bg-red-700 rounded-xl transition-colors shadow-xl">Șterge rețeta</button>
                    </form>
                    
                @endif

         </div>
    </div>

    @push('scripts')
        @vite("resources/js/format-tag.js")
        @vite("resources/js/format-category.js")
        @vite("resources/js/format-difficulty.js")
    @endpush
</x-layout>
