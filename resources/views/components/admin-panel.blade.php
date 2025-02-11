<div class="flex flex-col w-full justify-center items-center px-5 md:px-10 lg:px-20 pt-20 gap-10 md:gap-20">
    <h1 class="text-lg sm:text-xl md:text-2xl lg:text-3xl">{{$title}}</h1>



    <div class="grid  grid-cols-1 gap-5 md:gap-20 md:grid-cols-2 lg:grid-cols-3">

        @foreach ($users as $user)
        <div class="flex place-items-center flex-col justify-between gap-10 items-center px-4 py-2 rounded-lg shadow-xl bg-white">
            <?xml version="1.0" ?><svg style="enable-background:new 0 0 24 24;" class="max-w-[60px]" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><g id="user"><ellipse cx="12" cy="8" rx="5" ry="6"/><path d="M21.8,19.1c-0.9-1.8-2.6-3.3-4.8-4.2c-0.6-0.2-1.3-0.2-1.8,0.1c-1,0.6-2,0.9-3.2,0.9s-2.2-0.3-3.2-0.9    C8.3,14.8,7.6,14.7,7,15c-2.2,0.9-3.9,2.4-4.8,4.2C1.5,20.5,2.6,22,4.1,22h15.8C21.4,22,22.5,20.5,21.8,19.1z"/></g></g></svg>
           <div class="flex flex-col gap-3">
            <span class="font-semibold md:text-lg text-center">{{$user->name}}</span>
            <span>{{$user->email}}</span>
            <span>Rol: {{$user->role}}</span>
            <span>Data creării: {{$user->created_at->format('d-m-y')}}</span>
        </div>
        <div class="flex gap-5 md:gap-10">
            <span>Rețete: {{$user->recipes_counter}}</span>
            <span>Rețete salvate: {{$user->saved_recipes}}</span>
        </div>
        <form action="{{route('user.details', ['userId'=>$user->id])}}" method="GET">
            <button type="submit" class="rounded-md px-2 py-1 bg-accentLight hover:bg-accent transition-colors shadow-xl text-white">Mai multe detalii</button>
        </form>
    </div>
    @endforeach
</div>
    
</div>