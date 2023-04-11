<header>
    <div>
        <a href="{{route ('main')}}"><h1>Заявки</h1></a>
    </div>
    <div>
        <a href="">{{Auth::user()->firstname}}</a>
        {{-- <a href="">{{ Auth::user()->firstname}}</a> --}}
        <a href="{{route ('auth.logout')}}">Выход</a>
    </div>
</header>
