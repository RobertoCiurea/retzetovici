<x-layout>
    <div class="flex flex-col gap-20 items-center py-10">
        <h1 class="text-xl md:text-2xl font-quicksand ">Raportează o problemă</h1>
        @session('success')
            <span class="text-green-700 text-sm md:text-base">{{session('success')}}</span>
        @endsession
        <form action="{{route('report.store')}}" enctype="multipart/form-data" method="POST" class="flex flex-col items-center gap-5">
            @csrf
            <!--Name section-->
            <div class="flex flex-col gap-2">
                <label for="name" class="text-sm text-gray-500">Nume</label>
                
                @error('name')
                <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
                <input type="text" name="name" class="bg-white shadow-xl rounded-lg border-0 py-0.5 px-2 text-gray-800 focus:outline-none focus:ring focus:ring-purple-500 focus:border-purple-500" >
            </div>
            <!--Email section-->
            <div class="flex flex-col gap-2">
                
                @error('email')
                <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
                <label for="email" class="text-sm text-gray-500">Email</label>
                <input type="email" name="email" class="bg-white shadow-xl rounded-lg border-0 py-0.5 px-2 text-gray-800 focus:outline-none focus:ring focus:ring-purple-500 focus:border-purple-500" >
            </div>
            <!--Title section-->
            <div class="flex flex-col gap-2">
                
                @error('title')
                <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
                <label for="title" class="text-sm text-gray-500">Titlu</label>
                <input type="text" name="title" class="bg-white shadow-xl rounded-lg border-0 py-0.5 px-2 text-gray-800 focus:outline-none focus:ring focus:ring-purple-500 focus:border-purple-500" >
            </div>
            <!--Url section-->
            <div class="flex flex-col gap-2">
                
                <label for="url" class="text-sm text-gray-500">Url pagina (optional)</label>
                @error('url')
                <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
                <input type="url" name="url" class="bg-white shadow-xl rounded-lg border-0 py-0.5 px-2 text-gray-800 focus:outline-none focus:ring focus:ring-purple-500 focus:border-purple-500" >
            </div>

                <!--Image-->
                <div id="image-div" class="flex flex-col items-start gap-2">

                    <label for="image"  class="text-sm text-gray-500">Screenshot (optional)</label>
                    @error('image')
                    <span class="text-sm text-red-600">{{$message}}</span>
                    @enderror
    
                    <button type="button" id="button" class="rounded-md border-none block bg-purple-700 hover:bg-purple-800 transition-colors px-2 text-white py-1 shadow-xl cursor-pointer">Alege o imagine</button>
                    <label for="image" id="label"></label>
                    <input type="file" tabindex="-1" id="file" name="image" placeholder="Alege o imagine sugestiva" class="hidden" >
                </div>

            <!--Description section-->
            <div class="flex flex-col gap-2">
                
                <label for="description" class="text-sm text-gray-500">Descriere problema</label>
                @error('description')
                <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
                <textarea name="description" rows="10"  class="block bg-white shadow-xl w-full p-1 md:min-w-[300px] lg:min-w-[400px] rounded-lg border-0 text-gray-800 focus:outline-none focus:ring focus:ring-purple-500 focus:border-purple-500"></textarea>
            </div>

         
            <button type="submit" class="bg-green-700 hover:bg-green-800  text-white font-mono rounded-lg shadow-xl text-lg px-3 py-1">Trimite</button>
            <p class="text-sm sm:text-base">Sau ne poți scrie și la adresa de email: <a class="text-blue-800 hover:text-purple-900 transition-colors" href="mailto:ciurearobertoionut@hotmail.com?subject=Mesaj%20pentru%20dvs.">ciurearobertoionut@hotmail.com</a></p>
        </div>
        </form>
    </div>
    @push('scripts')
        @vite('resources/js/file-input.js')  
    @endpush
</x-layout>