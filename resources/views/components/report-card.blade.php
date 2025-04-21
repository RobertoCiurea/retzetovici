<div
    @class([
        'border-2 border-green-700' => strtolower($status) === 'resolved',
        'border-2 border-accent' => strtolower($status) === 'unresolved',
        'border-2 border-yellow-500' => strtolower($status) === 'in-process',
        'flex min-w-[300px]  md:max-w-[450px] flex-col rounded-lg bg-white px-6 py-5 shadow-xl mx-2'
    ])
>
    <!--Image section-->
    <img
        src="{{ $image }}"
        alt="Placeholder image"
        class="max-w-[300px] md:min-w-[250px] md:max-w-[400px]"
    />
    <!--Title section-->
    <h1 class="pt-3 font-quicksand text-lg font-bold md:text-xl">
        {{ $title }}
    </h1>
    <!--Details-->
    <div class="flex flex-col gap-2 font-quicksand">
        <span>Nume: {{ $name }}</span>
        <span>Email: {{ $email }}</span>
        <span>Creat pe: {{ $date }}</span>
    </div>

    <!--Buttons-->
    <div class="flex flex-col gap-5 md:gap-0 md:flex-row w-full justify-between px-5 md:px-16 pt-14">
        <!--Details buttons-->
        <form action="{{ route("report.details", ["id"=>$id]) }}" method="GET">
            <button
                type="submit"
                id="details-button"
                class="rounded-lg bg-green-600 px-2 py-1 font-quicksand text-white transition-colors hover:bg-green-700 w-full"
            >
                Detalii
            </button>
        </form>
        <!--Delete buttons-->
     <x-modal :openButton="'Șterge'" :openButtonStyles="'rounded-lg bg-accent px-2 py-1 font-quicksand text-white transition-colors hover:bg-red-800'">
        <div class="flex flex-col items-center gap-5 pt-5">

            <h1>Esti sigur ca vrei sa stergi definitiv acest report? (ID: {{ $id }})</h1>
            <form action="{{ route('report.delete', ["id"=>$id]) }}" method="POST">
                @csrf
                <button type="submit" id="delete-button" class="rounded-lg bg-accent px-3 py-1 font-quicksand text-white transition-colors hover:bg-red-800">Șterge report</button>
            </form>
        </div>
     </x-modal>
    </div>
    <!--Status section-->
    <section class="mt-5 flex flex-col gap-10 md:gap-0 md:flex-row w-full justify-between">
        <h1 class="font-quicksand font-bold uppercase text-black">
            STATUS:

            @switch(strtolower($status))
                @case("unresolved")
                    NEREZOLVAT

                    @break
                @case("resolved")
                    REZOLVAT

                    @break
                @default
                    IN CURS DE REZOLVARE
            @endswitch
        </h1>

        <x-modal
            :openButton="'Modifica status'"
            :openButtonStyles="'text-gray-600 underline text-sm sm:text-base hover:text-gray-800 transition-colors'"
        >
            <div class="flex w-full flex-col gap-10">
                <h1 class="font-quicksand text-black md:text-lg">
                    Modifica status
                </h1>
                <form method="POST" action="{{ route('report.update-status', ["id"=>$id]) }}" class="w-full" id="form">
                    @csrf
                    <div class="flex flex-col gap-5 font-quicksand">
                        <!--UNRESOLVED-->
                        <div class="flex gap-2">
                            
                            <input id="unresolved-input" type="radio" name="status" value="unresolved" @checked( strtolower($status) === "unresolved") class="cursor-pointer">
                            <label for="unresolved-input">Nerezolvat</label>
                        </div>
                        <!--IN PROCESS-->
                        <div class="flex gap-2">
                            <input id="in-process-input" type="radio" name="status" value="in-process" @checked(strtolower($status) === "in-process") class="cursor-pointer">
                            <label for="in-process-input">In curs de rezolvare</label>
                        </div>
                        <!--RESOLVED-->
                        <div class="flex gap-2">
                            <input id="resolved-input" type="radio" name="status" value="resolved"  @checked(strtolower($status) === "resolved")  class="cursor-pointer">
                            <label for="resolved-input">Rezolvat</label>
                        </div>
                        <button type="submit" class="bg-green-700 hover:bg-green-800 text-white rounded-lg px-2 py-1 focus:outline-none focus:border-none focus:ring-green-900 focus:ring-2">Modifica status</button>
                </form>
                
        </x-modal>
    </section>
</div>
@push("scripts")
    @vite("resources/js/format-admin-status-radio-buttons.js")
@endpush
