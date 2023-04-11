@extends('layout.layout')

@section('page_title', 'Автоиризация')

@section('content')
    {{-- @dd(Auth::check()) --}}
    <section class="form-auth">
        <form action="{{ route ('auth.signin-form')}}" method="POST">
            <h2>Аунтентификация</h2>
            @csrf
            <input name="login" type="text" placeholder="Логин">
            <input type="password" name="password" placeholder="Пароль">
            <div>
                <a href="{{route ('signup')}}">Регистрация</a>
                <button>Войти</button>
            </div>
        </form>
    </section>

    {{-- Вывод ошибок --}}
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>
                <p>{{ $error }}</p>
            </div>
        @endforeach
    @endif
@endsection
