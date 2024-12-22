<div class="flex flex-col rounded-lg p-2 bg-transparent cursor-pointer mx-5 text-black group hover:text-white hover:bg-gradient-to-l border-2 max-w-[500px] border-black from-accent to-accentLight transition-colors" >
    <span class="text-sm font-bold text-gray-500 group-hover:text-gray-300  uppercase">Categorie: {{$category}}</span>
    <img src="{{$image}}" alt="{{$title}}">
    <p class="font-bold font-quicksand">{{$title}}</p>
    <!--Bottom stats-->
    <div class="flex justify-between mx-10 items-center text-gray-500 group-hover:text-gray-300">
        <div>Timp de lucru: {{$duration}}</div>
        <!--Views and likes-->
        <div class="flex gap-16 items-center">
            <!--Views-->
            <div class="flex gap-2 items-center">
                <img src="{{url('/icons/view-icon.svg')}}" alt="Vizionari">
                <span>{{$views}}</span>
            </div>
            <!--Likes-->
            <div class="flex gap-2 items-center">
                <img src="{{url('/icons/like-icon.svg')}}" alt="Aprecieri">
                <span>{{$likes}}</span>
            </div>
        </div>
    </div>
</div>