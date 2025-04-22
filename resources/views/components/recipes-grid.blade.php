<div class="flex flex-col items-center gap-10 pt-10 font-kanit">
    <h1 class="text-xl font-semibold text-black md:text-2xl lg:text-3xl">
        {{ $title }}
    </h1>
    @if (Route::currentRouteName() !== "my-account")
        <x-filters />
    @endif

    @if (! $recipes->isEmpty())
        <div
            class="grid grid-cols-1 gap-5 lg:grid-cols-2 lg:gap-10 xl:grid-cols-3"
        >
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
        <span class="text-lg font-semibold text-red-600 md:text-xl lg:text-2xl">
            Nu există rețete
        </span>
    @endif
</div>
