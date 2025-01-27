<div class="flex flex-col lg:flex-row justify-around gap-20 pl-2 lg:mx-10">

        <!--User details-->
        <div class="flex flex-col items-start gap-20">
            <h1 class="font-kanit text-2xl md:text-3xl text-black">Detalii utilizator</h1>
            @session('success')
                <span class="text-lg text-green-600">
                   {{ session('success')}}
                </span>
            @endsession

            <!--Name section-->
            <div class="flex flex-col">
                <p class="md:text-xl font-bold">Nume</p>
                @error('name')
                <span class="text-sm text-red-600">{{$message}}</span>
            @enderror
                <div class="flex gap-3">
                    <span id="name" class="text-lg italic">{{$user->name}}</span>
                    <button type="button" id="edit-name" class="bg-green-700 hover:bg-green-800 transition-colors px-2 py-1 rounded-lg text-white shadow-xl">Editeaza</button>
                </div>
                <form action="{{ route('user.update', ['userId' => $user->id]) }}" id="name-form" method="POST" class="hidden">
                    @csrf
                    @method("PUT")
                    <input type="text" name="name" class="px-2 py-1 bg-white shadow-xl rounded-md" value="{{$user->name}}" >
                    <button type="submit" class="bg-green-700 hover:bg-green-800 transition-colors px-2 py-1 rounded-lg text-white shadow-xl">Confirma</button>
                </form>
            </div>

            <!--Email section-->
            <div class="flex flex-col">
                <p class="md:text-xl font-bold">Email</p>
                @error('email')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
                <div class="flex gap-3">
                    <span id="email" class="text-lg italic" >{{$user->email}}</span>
                    <button type="button" id="edit-email" class="bg-green-700 hover:bg-green-800 transition-colors px-2 py-1 rounded-lg text-white shadow-xl">Editeaza</button>
                </div>
                <form action="{{ route('user.update', ['userId' => $user->id]) }}" id="email-form" method="POST" class="hidden">
                    @csrf
                    @method("PUT")
                    <input type="text" name="email" class="px-2 py-1 bg-white shadow-xl rounded-md" value="{{$user->email}}" >
                    <button type="submit" class="bg-green-700 hover:bg-green-800 transition-colors px-2 py-1 rounded-lg text-white shadow-xl">Confirma</button>
                </form>
            </div>

            <!--Delete account section-->
            <form action="{{ route('user.delete', ['userId' => $user->id]) }}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-quicksand px-3 py-1 rounded-lg text-lg">Sterge cont</button>
            </form>
        </div>
        <!--Account's statistics-->
        <div class="flex flex-col items-start gap-20 text-black">
            <h1 class="font-kanit text-2xl md:text-3xl ">Statisticile contului</h1>
            <!--Recipes counter-->
            <span class="md:text-xl font-semibold">Numar retete: {{$user->recipes_counter}}</span>
            <span class="md:text-xl font-semibold">Aprecieri: {{$user->likes}}</span>
            <span class="md:text-xl font-semibold">Retete salvate: {{$user->saved_recipes}}</span>
        </div>
</div>

