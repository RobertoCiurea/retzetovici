<x-layout>
    <div class="flex flex-col items-center gap-10">
            <form action="{{route('contact')}}" method="POST" class="flex flex-col pt-20 gap-10 items-center mx-auto w-full">
                @csrf
                <h1 class="text-xl sm:text-2xl md:text-3xl font-kanit pb-10">Contactează-ne</h1>
                @session('success')
                    <span class="text-sm sm:text-base text-green-600">{{session('success')}}</span>
                @endsession
            <!--Name input-->
            <div class="flex flex-col">
                <label for="name" class="font-quicksand text-sm sm:text-base">Nume</label>
                @error('name')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
                <input name="name" type="text" class="bg-white shadow-xl rounded-lg border-0 py-0.5 px-2 text-gray-800 focus:outline-none focus:ring focus:ring-purple-500 focus:border-purple-500">
            </div>

            <!--Email input-->
            <div class="flex flex-col">
                <label for="name" class="font-quicksand text-sm sm:text-base">Email</label>
                @error('email')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
                <input name="email" type="email" class="bg-white shadow-xl rounded-lg border-0 py-0.5 px-2 text-gray-800 focus:outline-none focus:ring focus:ring-purple-500 focus:border-purple-500">
            </div>

            <!--Message input-->
            <div class="flex flex-col">
                <label for="name" class="font-quicksand text-sm sm:text-base text-start">Mesajul tau</label>
                @error('message')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
                <textarea name="message" rows="10"  class="block bg-white shadow-xl w-full p-1 md:min-w-[300px] lg:min-w-[400px] rounded-lg border-0 text-gray-800 focus:outline-none focus:ring focus:ring-purple-500 focus:border-purple-500"></textarea>
            </div>
            <button type="submit" class="px-3 py-1 md:text-lg bg-purple-600 hover:bg-purple-700 transition-colors text-white rounded-lg shadow-xl">Trimite</button>
        </form>
        <p class="text-sm sm:text-base">Sau ne poți scrie și la adresa de email: <a class="text-blue-800 hover:text-purple-900 transition-colors" href="mailto:ciurearobertoionut@hotmail.com?subject=Mesaj%20pentru%20dvs.">ciurearobertoionut@hotmail.com</a></p>
    </div>

</x-layout>