
    <ul @if ($type==='mobile')
        id="list"
    @endif  
    class="{{$type=== 'mobile' ?'hidden flex-col items-center  justify-center gap-5' :'flex justify-center gap-5'}}">
        <li class="text-xl text-background drop-shadow-xl flex flex-col group">
            <a href="#"> Adaugă rețetă nouă</a>
            <span class="w-0 group-hover:w-full block bg-background h-[2px] shadow-xl transition-all duration-500"></span>
        </li>
        <li class="text-xl text-background drop-shadow-xl flex flex-col group">
            <a href="#"> Explorează rețete populare</a>
            <span class="w-0 group-hover:w-full block bg-background h-[2px] shadow-xl transition-all duration-500"></span>
            </li>
        <li class="text-xl text-background drop-shadow-xl flex flex-col group">
            <a href="#"> Categorii</a>
            <span class="w-0 group-hover:w-full block bg-background h-[2px] shadow-xl transition-all duration-500"></span>
            </li>
        <li class="text-xl text-background drop-shadow-xl flex flex-col group">
            <form action="/my-account" method="GET">
                <button type="submit">Contul meu</button>
                <span class="w-0 group-hover:w-full block bg-background h-[2px] shadow-xl transition-all duration-500"></span>
            </form>
            </li>
    </ul>
