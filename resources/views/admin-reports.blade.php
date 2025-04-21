@php
    $selectedContent = request()->get("content");
@endphp

<x-layout>
    <div class="flex flex-col items-center pt-20 md:px-10">
        <h1 class="font-quicksand text-xl text-black md:text-3xl">
            Mesaje report
        </h1>
        @session("success")
            <span class="text-sm text-green-700 md:text-base">
                {{ session("success") }}
            </span>
        @endsession

        @session("error")
            <span class="text-sm text-red-600 md:text-base">
                {{ session("error") }}
            </span>
        @endsession

        <section
            class="mt-20 flex w-full flex-col justify-around gap-5 font-mono text-black md:flex-row md:gap-0"
        >
            <form action="" method="GET" class="group flex flex-col gap-1">
                <button type="submit" class="md:text-xl">
                    Report-uri nerezolvate
                </button>
                <input type="hidden" value="unresolved" name="content" />
                @if (request("content") === "unresolved")
                    <span class="block h-1 w-full rounded-md bg-black"></span>
                @else
                    <span
                        class="block h-1 w-0 rounded-md bg-black transition-all duration-500 group-hover:w-full"
                    ></span>
                @endif
            </form>

            <form action="" method="GET" class="group flex flex-col gap-1">
                <button type="submit" class="md:text-xl">
                    Report-uri rezolvate
                </button>
                <input type="hidden" value="resolved" name="content" />
                @if (request("content") === "resolved")
                    <span class="block h-1 w-full rounded-md bg-black"></span>
                @else
                    <span
                        class="block h-1 w-0 rounded-md bg-black transition-all duration-500 group-hover:w-full"
                    ></span>
                @endif
            </form>

            <form
                action="/messages/report"
                method="GET"
                class="group flex flex-col gap-1"
            >
                <input type="hidden" value="in-process" name="content" />
                <button type="submit" class="md:text-xl">
                    Report-uri în curs de rezolvare
                </button>
                @if (request("content") === "in-process")
                    <span class="block h-1 w-full rounded-md bg-black"></span>
                @else
                    <span
                        class="block h-1 w-0 rounded-md bg-black transition-all duration-500 group-hover:w-full"
                    ></span>
                @endif
            </form>
        </section>
    </div>
    <div class="mt-20 flex w-full justify-center">
        <div
            class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:gap-20 xl:grid-cols-3"
        >
            @foreach ($reports as $report)
                @if (! $selectedContent || strtolower($report->status) === $selectedContent)
                    <x-report-card
                        :id="$report->id"
                        :title="$report->title"
                        :name="$report->name"
                        :email="$report->email"
                        :date="$report->created_at->format('d-m-20y')"
                        :status="$report->status"
                        :image="$report->image"
                    />
                @endif
            @endforeach
        </div>
    </div>
</x-layout>
