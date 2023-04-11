@extends('layout.layout')

@section('page_title', 'Регистрация')

@section('content')
    <section class="form-auth">
        <form action="{{route ('auth.signup')}}" method="POST">
            <h2>Регистрация</h2>
            @csrf
            <input value="{{ old('firstname') }}"  type="text" name="firstname" placeholder="Имя">
            <input value="{{ old('lastname') }}"  type="text" name="lastname" placeholder="Фамилия">
            <input value="{{ old('surname') }}"  type="text" name="surname" placeholder="Отчество">
            <input value="{{ old('number_phone') }}"  type="tel" name="number_phone" placeholder="Номер телефона">
            <input value="{{ old('login') }}"  name="login" type="text" placeholder="Логин">
            <input  type="password" name="password" placeholder="Пароль">
            <input  type="password" name="re_password" placeholder="Повторите пароль">
            <div>
                <a href="{{ route('signin') }}">Авторизоваться</a>
                <button>Зарегистрироваться</button>
            </div>
        </form>

        {{-- Вывод ошибок --}}
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="error">
                    <p>{{ $error }}</p>
                </div>
            @endforeach
        @endif
    </section>
@endsection
