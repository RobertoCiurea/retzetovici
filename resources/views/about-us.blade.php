<x-layout>
    <div class="mx-auto max-w-4xl px-4 py-20 sm:px-6 lg:px-8">
        <h1 class="mb-24 text-center text-5xl font-bold text-accent">
            Bine ai venit la Retzetovici!
        </h1>

        <section class="mb-12">
            <h2 class="mb-4 text-3xl font-semibold text-purple-700">
                Ce este Retzetovici?
            </h2>
            <p class="text-lg leading-relaxed">
                Retzetovici este colțul tău vesel de rețete culinare, unde
                creativitatea întâlnește savoarea! Aici poți găsi, creea și
                împărtăși rețete delicioase, pline de personalitate și culoare.
            </p>
        </section>

        <section class="mb-12">
            <h2 class="mb-4 text-3xl font-semibold text-purple-700">
                Misiunea noastră
            </h2>
            <p class="text-lg leading-relaxed">
                Ne dorim să inspirăm fiecare pasionat de gătit să-și descopere
                propriul stil în bucătărie. Fie că ești începător sau chef
                profesionist, Retzetovici îți oferă un spațiu prietenos, unde
                fiecare rețetă devine o poveste pe farfurie.
            </p>
        </section>

        <section class="mb-12">
            <h2 class="mb-4 text-3xl font-semibold text-purple-700">
                De ce să ni te alături?
            </h2>
            <ul class="list-inside list-disc space-y-2 text-lg">
                <li>
                    Descoperi rețete unice, testate și apreciate de comunitate.
                </li>
                <li>
                    Îți creezi propriul cont și îți pui în valoare talentul
                    culinar.
                </li>
                <li>
                    Urmărești alți bucătari virtuali și schimbi idei delicioase.
                </li>
                <li>
                    Participi la provocări și câștigi distincții delicioase.
                </li>
            </ul>
        </section>

        <section class="mb-12 text-center">
            <h2 class="mb-4 text-3xl font-semibold text-purple-700">
                Hai alături de noi!
            </h2>
            <p class="mb-6 text-lg">
                Creează-ți un cont astăzi și începe să gătești cu zâmbetul pe
                buze!
            </p>
            <a
                href="{{ route("register") }}"
                class="inline-block rounded-full bg-green-500 px-6 py-3 font-semibold text-white shadow transition hover:bg-green-600"
            >
                Înregistrează-te acum
            </a>
        </section>

        <p class="text-center text-sm text-gray-500">
            &copy; {{ date("Y") }} Retzetovici. Toate drepturile rezervate.
        </p>
    </div>
</x-layout>
