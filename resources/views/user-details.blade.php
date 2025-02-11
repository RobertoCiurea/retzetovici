<x-layout>
    <div class="w-full flex flex-col pt-10"></div>
    <x-account-details :user="$user"></x-account-details>
    @push('scripts')
        @vite('resources/js/account.js')
    @endpush
</x-layout>