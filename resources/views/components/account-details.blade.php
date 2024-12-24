<div class="flex flex-col lg:flex-row justify-around gap-20 pl-2 lg:mx-10">

        <!--User details-->
        <div class="flex flex-col items-start gap-20">
            <h1 class="font-kanit text-2xl md:text-3xl text-black">Detalii utilizator</h1>

            <!--Name section-->
            <div class="flex flex-col">
                <p class="md:text-xl font-bold">Nume</p>
                <div class="flex gap-3">
                    <span id="name" class="text-lg italic">{{auth()->user()->name}}</span>
                    <button type="button" id="edit-name" class="bg-green-700 hover:bg-green-800 transition-colors px-2 py-1 rounded-lg text-white shadow-xl">Editeaza</button>
                </div>
                <form action="/updateName/{{auth()->user()->id}}" id="name-form" method="POST" class="hidden">
                    @csrf
                    @method("PUT")
                    <input type="text" name="name" class="px-2 py-1 bg-white shadow-xl rounded-md" value="{{auth()->user()->name}}" >
                    <button type="submit" class="bg-green-700 hover:bg-green-800 transition-colors px-2 py-1 rounded-lg text-white shadow-xl">Confirma</button>
                </form>
            </div>

            <!--Email section-->
            <div class="flex flex-col">
                <p class="md:text-xl font-bold">Email</p>
                <div class="flex gap-3">
                    <span id="email" class="text-lg italic" >{{auth()->user()->email}}</span>
                    <button type="button" id="edit-email" class="bg-green-700 hover:bg-green-800 transition-colors px-2 py-1 rounded-lg text-white shadow-xl">Editeaza</button>
                </div>
                <form action="/updateEmail/{{auth()->user()->id}}" id="email-form" method="POST" class="hidden">
                    @csrf
                    @method("PUT")
                    <input type="text" name="email" class="px-2 py-1 bg-white shadow-xl rounded-md" value="{{auth()->user()->email}}" >
                    <button type="submit" class="bg-green-700 hover:bg-green-800 transition-colors px-2 py-1 rounded-lg text-white shadow-xl">Confirma</button>
                </form>
            </div>

            <!--Delete account section-->
            <form action="/deleteUser/{{auth()->user()->id}}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-quicksand px-3 py-1 rounded-lg text-lg">Sterge cont</button>
            </form>
        </div>
        <!--Account's statistics-->
        <div class="flex flex-col items-start gap-20 text-black">
            <h1 class="font-kanit text-2xl md:text-3xl ">Statisticile contului</h1>
            <!--Recipes counter-->
            <span class="md:text-xl font-semibold">Numar retete: 0</span>
            <span class="md:text-xl font-semibold">Aprecieri: 0</span>
            <span class="md:text-xl font-semibold">Retete salvate: 0</span>
        </div>
</div>
