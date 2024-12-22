<div>
  <x-layout>
    <div class="flex h-full">
      <!--Left section (side-menu)-->
      <div class="flex flex-col justify-between  bg-accentLight px-10 text-gray-100  py-5 h-[65%] m-10 rounded-lg ">

        <div class="flex flex-col gap-10 border-b-2 border-red-400">
                 <!--Welcome message-->
          <div class="text-lg font-semibold border-b-2 text-white border-red-400">Bunt venit {{auth()->user()->name}}</div>
                 <!--Account details-->
          <div class="hover:bg-red-400 group transition-colors px-2 pt-2 flex justify-center items-center text-lg">
            <form action="/account-details" method="GET" class="flex gap-2 items-center">
              <img src="{{url('icons/account-details-icon.svg')}}" width="30" alt="Detalii cont">
              <button type="submit" class="group-hover:text-white transition-colors">Detalii cont</button>
            </form>
          </div>
                  <!--Account recipes-->
          <div class="hover:bg-red-400 group transition-colors px-2 pt-2 flex justify-center items-center text-lg">
            <form action="/my-recipes" method="GET" class="flex gap-2 items-center">
              <img src="{{url('icons/my-recipes-icon.svg')}}" width="35" alt="Retetele mele">
              <button type="submit" class="group-hover:text-white transition-colors">Retetele mele</button>
            </form>
          </div>
                  <!--Saved recipes-->
          <div class="hover:bg-red-400 group transition-colors px-2 pt-2 flex justify-center items-center text-lg">
            <form action="/saved-recipes" method="GET" class="flex gap-2 items-center">
              <img src="{{url('icons/saved-recipes-icon.svg')}}" width="35" alt="Retete salvate">
              <button type="submit" class="group-hover:text-white transition-colors">Retete salvate</button>
            </form>
          </div>

          </div>
          <!--Log out button-->
          <div class="hover:bg-red-400 border-b-2 border-red-400 group transition-colors px-2 pt-2 flex justify-center items-center text-lg">
            <form action="/logout" method="POST" class="flex gap-2 items-center">
              @csrf
              <img src="{{url('icons/log-out-icon.svg')}}" width="30" alt="Iesire din cont">
              <button type="submit" class="group-hover:text-white transition-colors">Iesire din cont</button>
            </form>
          </div>
       </div>
       <!--Content-->
       <div class="flex flex-col mt-10">
        @switch($content)
            @case('account-details')
                Detalii cont
                @break
            @case('my-recipes')
                Retetele mele
                @break
            @case('saved-recipes')
                Retete salvate
                @break
        
                
        @endswitch
       </div>
    </div>
  </x-layout>
</div>
