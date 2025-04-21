<x-layout>
    <div
        class="flex flex-col items-center justify-center pt-5 md:px-10 md:pt-10"
    >
        <!--Title-->
        <h1 class="font-quicksand text-xl text-black md:text-3xl">
            {{ $report->title }}
        </h1>
        <!--Image and reporter data-->
        <section class="flex flex-col gap-10 pt-14">
            <image src="{{ $report->image }}" alt="{{ $report->title }}" />
            <div class="flex flex-col items-start gap-2 text-gray-800">
                <p class="font-mono">
                    Nume:
                    <span class="font-semibold">{{ $report->name }}</span>
                </p>
                <p class="font-mono">
                    Email:
                    <a href="mailto:{{$report->email}}?subject=Raspuns%20report%20ID:{{$report->id  }}." class="hover:font-semibold hover:underline">{{ $report->email }}</a>
                </p>

                <p class="font-mono">
                    Data crearii: {{ $report->created_at }}
                </p>
                @if (! is_null($report->url))
                    <p class="font-mono">
                        Url tinta:
                        <a
                            href="{{ $report->url }}"
                            class="hover:underline"
                        >
                            {{ $report->url }}
                        </a>
                    </p>
                @endif

                <p class="font-mono uppercase">
                    status:
                    <span class="font-semibold">
                        @switch(strtolower($report->status))
                            @case("unresolved")
                                nerezolvat

                                @break
                            @case("resolved")
                                rezolvat

                                @break
                            @default
                                în curs de rezolvare
                        @endswitch
                    </span>
                </p>
            </div>
        </section>
        <p class="pt-14 font-quicksand text-gray-800">
            {{ $report->description }}
        </p>

        <!--Buttons-->
        <div class="flex w-full flex-col gap-10 pt-14 md:w-[10%]">
            <!--Delete report button-->
            <x-modal
                :openButton="'Șterge'"
                :openButtonStyles="'rounded-lg bg-accent shadow-xl px-2 py-1 font-quicksand text-white transition-colors hover:bg-red-800'"
            >
                <div class="flex flex-col items-center gap-5 pt-5">
                    <h1>
                        Esti sigur ca vrei sa stergi definitiv acest report?
                        (ID: {{ $report->id }})
                    </h1>
                    <form
                        action="{{ route("report.delete", ["id" => $report->id]) }}"
                        method="POST"
                    >
                        @csrf
                        <button
                            type="submit"
                            id="delete-button"
                            class="rounded-lg bg-accent px-3 py-1 font-quicksand text-white transition-colors hover:bg-red-800"
                        >
                            Șterge report
                        </button>
                    </form>
                </div>
            </x-modal>
            <!--Change report status button-->
            <x-modal
            :openButton="'Modifica status'"
            :openButtonStyles="'rounded-lg bg-gray-500 px-2 py-1 shadow-xl font-quicksand text-white transition-colors hover:bg-gray-600'"
        >
            <div class="flex w-full flex-col gap-10">
                <h1 class="font-quicksand text-black md:text-lg">
                    Modifica status
                </h1>
                <form method="POST" action="{{ route('report.update-status', ["id"=>$report->id]) }}" class="w-full" id="form">
                    @csrf
                    <div class="flex flex-col gap-5 font-quicksand">
                        <!--UNRESOLVED-->
                        <div class="flex gap-2">
                            
                            <input id="unresolved-input" type="radio" name="status" value="unresolved" @checked( strtolower($report->status) === "unresolved") class="cursor-pointer">
                            <label for="unresolved-input">Nerezolvat</label>
                        </div>
                        <!--IN PROCESS-->
                        <div class="flex gap-2">
                            <input id="in-process-input" type="radio" name="status" value="in-process" @checked(strtolower($report->status) === "in-process") class="cursor-pointer">
                            <label for="in-process-input">In curs de rezolvare</label>
                        </div>
                        <!--RESOLVED-->
                        <div class="flex gap-2">
                            <input id="resolved-input" type="radio" name="status" value="resolved"  @checked(strtolower($report->status) === "resolved")  class="cursor-pointer">
                            <label for="resolved-input">Rezolvat</label>
                        </div>
                        <button type="submit" class="bg-green-700 hover:bg-green-800 text-white rounded-lg px-2 py-1 focus:outline-none focus:border-none focus:ring-green-900 focus:ring-2">Modifica status</button>
                </form>
                
        </x-modal>
        </div>
    </div>
</x-layout>
