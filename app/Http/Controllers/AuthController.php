<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Функция регистрации
    public function signup(Request $request)
    {
        // dd($request->all());

        // Валидация полученых данных
        $validator = Validator::make($request->all(), [
            'login' => 'required|unique:users,login',
            'password' => 'required|min:6|max:128|same:re_password',
            'firstname' => 'required',
            'lastname' => 'required',
            'surname' => 'required',
            'number_phone' => 'required|numeric|min:11'
        ]);

        // При наличии ошибок отправляет обратно на страницу и выводит ошибки
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        $validated = $validator->validate();

        // Хеширование пароля
        $validated['password'] = Hash::make($validated['password']);

        // Создание пользователя в таблице
        $user = User::query()->create($validated);

        // Авторизация пользователя сразу после регистрации
        Auth::login($user);
        return redirect()->route('main');
    }

    // Авторизация
    public function signin(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'login'=>'required',
            'password'=>'required|min:6|max:128',
        ]);
        // dd($request);
        $validated = $validator->validate();
        if (!Auth::attempt($validated)) {
            return back()->withErrors(['Введенные вами данные неверны']);
        }
        return redirect()->route('main');
    }

    // Функция выход из профиля
    public function logout()
    {
        Auth::logout();
        return redirect()->route('signin');
    }
}
