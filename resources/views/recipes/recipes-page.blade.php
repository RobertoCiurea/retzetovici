<x-layout>
    @session('success')
        <span class="text-green-600 font-kanit text-center pt-10">{{session('success')}}</span>
    @endsession
    <x-recipes-grid :title="$title" :recipes="$recipes"></x-recipes-grid>
</x-layout>