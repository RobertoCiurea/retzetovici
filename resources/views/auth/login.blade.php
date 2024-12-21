<x-layout>
    <div class="flex flex-col gap-10 justify-center items-center pt-20 font-quicksand">
        
        <h1 class="text-xl md:text-3xl">Loghează-te</h1>
        <x-auth-form type='login' action='/login'></x-auth-form>
    </div>
</x-layout>