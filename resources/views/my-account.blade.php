<div>
  <x-layout>
    <div class="flex flex-col sm:flex-row ">
      <!--Left section (side-menu)-->
      <div class="flex flex-col md:justify-between  bg-accentLight px-10 text-gray-100  py-5 h-[65%] m-10 rounded-lg ">

          <!--Section without log out button-->
        <div class="flex flex-col mb-20 md:mb-10 gap-10 border-b-2 border-red-400">
                 <!--Welcome message-->
          <div class="text-lg font-semibold border-b-2 text-white border-red-400">Bunt venit {{auth()->user()->name}}</div>
                 <!--Account details-->
          <div class="hover:bg-red-400 group transition-colors px-2 pt-2 flex justify-center items-center text-lg">
            <form action="{{route('redirect.account-details')}}" method="GET" class="flex gap-2 items-center">
              <img src="{{url('icons/account-details-icon.svg')}}" width="30" alt="Detalii cont">
              <button type="submit" class="group-hover:text-white transition-colors">Detalii cont</button>
            </form>
          </div>
                  <!--Account recipes-->
          <div class="hover:bg-red-400 group transition-colors px-2 pt-2 flex justify-center items-center text-lg">
            <form action="{{route('redirect.my-recipes')}}" method="GET" class="flex gap-2 items-center">
              <img src="{{url('icons/my-recipes-icon.svg')}}" width="35" alt="Retetele mele">
              <button type="submit" class="group-hover:text-white transition-colors">Rețetele mele</button>
            </form>
          </div>
                  <!--Saved recipes-->
          <div class="hover:bg-red-400 group transition-colors px-2 pt-2 flex justify-center items-center text-lg">
            <form action="{{route('redirect.saved-recipes')}}" method="GET" class="flex gap-2 items-center">
              <img src="{{url('icons/saved-recipes-icon.svg')}}" width="35" alt="Retete salvate">
              <button type="submit" class="group-hover:text-white transition-colors">Rețete salvate</button>
            </form>
          </div>
          @if ($user->role === 'admin')
          <div class="hover:bg-red-400 group transition-colors px-2 pt-2 flex justify-center items-center text-lg">
            <form action="{{route('redirect.admin-panel')}}" method="GET" class="flex gap-2 items-center">
              <img src="{{url('icons/settings-icon.svg')}}" width="30" alt="Retete salvate">
              <button type="submit" class="group-hover:text-white transition-colors">Admin panel</button>
            </form>
          </div>
          @endif

          </div>
          <!--Log out button-->
          <div class="hover:bg-red-400 border-b-2 border-red-400 group transition-colors px-2 pt-2 flex justify-center items-center text-lg">
            <form action="/logout" method="POST" class="flex gap-2 items-center">
              @csrf
              <img src="{{url('icons/log-out-icon.svg')}}" width="30" alt="Iesire din cont">
              <button type="submit" class="group-hover:text-white transition-colors">Ieșire din cont</button>
            </form>
          </div>
       </div>
       <!--Content-->
       <div class="flex flex-col w-full mt-10">

        @switch($content)
            @case('account-details')
                <x-account-details :user="$user"></x-account-details>
       
                @break
            @case('my-recipes')
              <x-recipes-grid :recipes="$recipes" :title="'Rețete mele'"></x-recipes-grid>
    
                @break
            @case('saved-recipes')
            <x-recipes-grid :recipes="$savedRecipes" :title="'Rețete salvate'"></x-recipes-grid>
                @break
        
                
        @endswitch
       </div>
    </div>
    @push('scripts')
        @vite('resources/js/account.js')
    @endpush
  </x-layout>
</div>
