<x-layout>
    <div class="flex flex-col gap-5 w-full justify-center text-center items-center pt-20 text-red-600 text-lg  sm:text-xl md:text-2xl lg:text-3xl">
        <h1>Eroare</h1>
        @switch($status)
        @case(200)
            <h1>OK - Cererea a fost realizată cu succes.</h1>
            @break
        @case(201)
            <h1>Creat - Resursa a fost creată cu succes.</h1>
            @break
        @case(204)
            <h1>Fără conținut - Cererea a fost realizată, dar nu există conținut de returnat.</h1>
            @break
        @case(301)
            <h1>Mutat permanent - Resursa a fost mutată definitiv.</h1>
            @break
        @case(302)
            <h1>Mutare temporară - Resursa a fost mutată temporar.</h1>
            @break
        @case(400)
            <h1>Cerere greșită - Cererea nu poate fi procesată din cauza unei erori de client.</h1>
            @break
        @case(401)
            <h1>Neautorizat - Autentificare necesară pentru acces.</h1>
            @break
        @case(403)
            <h1>Interzis - Nu aveți permisiunea de a accesa această resursă.</h1>
            @break
        @case(404)
            <h1>Nu găsit - Resursa solicitată nu a fost găsită.</h1>
            @break
        @case(405)
            <h1>Metodă nepermisă - Metoda HTTP utilizată nu este permisă pentru această resursă.</h1>
            @break
        @case(408)
            <h1>Timeout - Serverul a expirat în așteptarea cererii.</h1>
            @break
        @case(409)
            <h1>Conflict - Cererea nu a putut fi procesată din cauza unui conflict cu resursa existentă.</h1>
            @break
        @case(500)
            <h1>Eroare internă a serverului - A apărut o eroare neașteptată.</h1>
            @break
        @case(502)
            <h1>Bad Gateway - Serverul a primit un răspuns invalid de la serverul upstream.</h1>
            @break
        @case(503)
            <h1>Serviciu indisponibil - Serverul nu poate procesa cererea în acest moment.</h1>
            @break
        @case(504)
            <h1>Gateway Timeout - Serverul upstream nu a răspuns la timp.</h1>
            @break
        @default
            <h1>Oops... Ceva nu a mers bine!</h1>
    @endswitch
        <form action="{{route('redirect.back')}}" method="GET">
            <button type="submit" class="text-accentLight hover:text-accent transition-colors sm:text-lg md:text-xl">Întoarce-te înapoi</button>
        </form>
    </div>
</x-layout>