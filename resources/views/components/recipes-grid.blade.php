<div class="flex flex-col gap-10 items-center font-kanit mt-5">
    <h1 class="text-xl md:text-2xl lg:text-3xl text-black font-semibold">{{$title}}</h1>
    
    @if (!$recipes->isEmpty())
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5  lg:gap-10 xl:gap-20 ">
            
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
        @else
            <span class="text-lg md:text-xl lg:text-2xl text-red-600 font-semibold">Nu există rețete</span>
    @endif
</div>