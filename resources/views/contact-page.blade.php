<x-layout>
    <div class="flex flex-col items-center gap-10">
        <form
            action="{{ route("contact") }}"
            method="POST"
            class="mx-auto flex w-full flex-col items-center gap-10 pt-20"
        >
            @csrf
            <h1 class="pb-10 font-kanit text-xl sm:text-2xl md:text-3xl">
                Contactează-ne
            </h1>
            @session("success")
                <span class="text-sm text-green-600 sm:text-base">
                    {{ session("success") }}
                </span>
            @endsession

            <!--Name input-->
            <div class="flex flex-col">
                <label for="name" class="font-quicksand text-sm sm:text-base">
                    Nume
                </label>
                @error("name")
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror

                <input
                    name="name"
                    type="text"
                    class="rounded-lg border-0 bg-white px-2 py-0.5 text-gray-800 shadow-xl focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-500"
                />
            </div>

            <!--Email input-->
            <div class="flex flex-col">
                <label for="name" class="font-quicksand text-sm sm:text-base">
                    Email
                </label>
                @error("email")
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror

                <input
                    name="email"
                    type="email"
                    class="rounded-lg border-0 bg-white px-2 py-0.5 text-gray-800 shadow-xl focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-500"
                />
            </div>

            <!--Message input-->
            <div class="flex flex-col">
                <label
                    for="name"
                    class="text-start font-quicksand text-sm sm:text-base"
                >
                    Mesajul tau
                </label>
                @error("message")
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror

                <textarea
                    name="message"
                    rows="10"
                    class="block w-full rounded-lg border-0 bg-white p-1 text-gray-800 shadow-xl focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-500 md:min-w-[300px] lg:min-w-[400px]"
                ></textarea>
            </div>
            <button
                type="submit"
                class="rounded-lg bg-purple-600 px-3 py-1 text-white shadow-xl transition-colors hover:bg-purple-700 md:text-lg"
            >
                Trimite
            </button>
        </form>
        <p class="text-center text-sm sm:text-base">
            Sau ne poți scrie și la adresa de email:
            <a
                class="text-blue-800 transition-colors hover:text-purple-900"
                href="mailto:ciurearobertoionut@hotmail.com?subject=Mesaj%20pentru%20dvs."
            >
                ciurearobertoionut@hotmail.com
            </a>
        </p>
    </div>
</x-layout>
