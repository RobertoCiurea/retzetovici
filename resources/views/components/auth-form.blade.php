
<form action="{{$action}}" method="POST"  class="flex flex-col items-center gap-10">
    @csrf
    @session('login_error')
    <span class="text-red-600 text-sm">

        {{session('login_error')}}
    </span>
    @endsession
    
    @session('success')
    <span class="text-green-600 text-sm">

        {{session('success')}}
    </span>
    @endsession

        
    <div class="flex flex-col gap-2">
        <label for="name" class="font-kanit text-sm">Nume utilizator</label>
        @error('name')
        <span class="text-sm  text-red-600">{{$message}}</span>
        @enderror
        <input type="text" name="name" class="shadow-xl rounded-md px-1 md:px-2 md:py-1 ">
    </div>
    @if ($type === 'register')
    <div class="flex flex-col gap-2">
        <label for="email" class="font-kanit text-sm">Email</label>
        @error('email')
        <span class="text-sm  text-red-600">{{$message}}</span>
        @enderror
        <input type="email" name="email" class="shadow-xl rounded-md px-1 md:px-2 md:py-1 ">
    </div>
    @endif
    <div class="flex flex-col gap-2">
        <label for="password" class="font-kanit text-sm">Parola</label>
        @error('password')
        <span class="text-sm  text-red-600">{{$message}}</span>
        @enderror
        <input type="password" name="password" class="shadow-xl rounded-md px-1 md:px-2 md:py-1 ">
    </div>
    @if ($type ==='register')
    <div class="flex flex-col gap-2">
        <label for="password_confirmation" class="font-kanit text-sm">Confirmă parola</label>
        <input type="password" name="password_confirmation" class="shadow-xl rounded-md px-1 md:px-2 md:py-1 ">
    </div>
    @endif
    @if ($type==='register')
        
    <!--Google recaptcha-->
    {!! NoCaptcha::renderJs('ro') !!}
    {!! NoCaptcha::display() !!}
    <span class="text-red-700">
        @if($errors->has('g-recaptcha-response'))
        {{$errors->first('g-recaptcha-response')}}
        @endif
    </span>
    @endif
    <button type="submit" class="md:text-lg text-white bg-gradient-to-b from-accentLight to-accent rounded-lg  px-2 py-1 hover:bg-opacity-90 transition-all shadow-xl">{{$type === 'login' ? "Loghează-te" : "Înregistrează-te"}}</button>
        @switch($type)
        @case('register')
        <div class="flex flex-col items-center text-sm">
            <p>Ai deja un cont?</p>
            <a href="{{url('/login')}}" class="text-red-700 underline hover:text-red-800 transition-colors">Loghează-te acum</a>
        </div>
            @break
        @case('login')
        <div class="flex flex-col items-center text-sm">
            <p>Nu ai cont?</p>
            <a href="{{url('/register')}}" class="text-red-700 underline hover:text-red-800 transition-colors">Înregistrează-te acum</a>
        </div>
            @break
            
    @endswitch
        
</form>

