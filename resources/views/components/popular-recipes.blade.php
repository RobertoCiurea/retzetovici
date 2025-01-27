<div class="flex flex-col items-center mt-10 px-5 " id="popular-recipes">

 
    <h1 class="text-2xl md:text-4xl text-accent font-kanit font-bold mb-10 px-5">Rețete populare</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-20">

        
        <!--Format category like tags-->
        @foreach ($recipes as $recipe)
        <x-recipe-card
        :id="$recipe->id"
        :image="$recipe->image"
        :title="$recipe->title" 
        :category="$recipe->category"
        :difficulty="$recipe->difficulty"
        :duration="$recipe->duration"
        :likes="$recipe->likes"
        :views="$recipe->views"
        :username="$recipe->username"
        :date="$recipe->created_at->format('d m 20y')"
        :ingredients="$recipe->ingredients"
        :tags="$recipe->tags"
        />
        
        @endforeach
    </div>

</div>
