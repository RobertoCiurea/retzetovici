<div class="flex flex-col items-center pt-20">
    <h1 class="text-xl md:text-2xl lg:text-3xl font-kanit">{{$title}}</h1>
    @session('deleted')
    <span class="text-green-700 ">{{session('deleted')}}</span>
        
    @endsession
    <div class="grid grid-cols-1 md:grid-cols-2 lg:gird-cols-3 pt-20">
        @foreach ($messages as $item)
        <div class="flex flex-col bg-white shadow-xl rounded-lg px-5 py-2 gap-5">
            @if ($item->title)
            <h1 class="font-kanit font-semibold">{{$item->title}}</h1>
            @endif
            <span class="text-sm sm:text-base text-wrap">{{$item->message}}</span>
            <div class="flex justify-between  items-center w-ful text-gray-500">
                <!--Left section-->
                <div class="flex flex-col">
                    <span>{{$item->name}}</span>
                    <a class="hover:text-blue-700 transition-colors" href="mailto:{{$item->email}}?subject=Salutare,%20{{$item->name}}!.">{{$item->email}}</a>
                </div>
                <!--Right Section-->
                <span>{{$item->created_at->format('d m 20y')}}</span>
            </div>
            <!--Buttons-->
            <div class="flex gap-10">
                <!--Answer (via email)-->
                <a  href="mailto:{{$item->email}}?subject=Salutare,%20{{$item->name}}!">
                    <button type="submit" class="px-2 py-1 bg-green-600 hover:bg-green-700 transition-colors text-white shadow-xl rounded-md">Raspunde</button>
                </a>
                <!--Delete contact message-->
                <form action="{{route('contact.delete', ["contactId"=>$item->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-2 py-1 bg-accentLight hover:bg-accent transition-colors text-white shadow-xl rounded-md">Șterge</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>  
</div>