@extends('layout.layout')

@section('page_title', 'Создание заявки')

@section('content')
    @include('components.header')
    <h1 class="h1-title-request">Добавление заявки</h1>

    <form action="{{route ('requests.add')}}" method="POST" class="form-add">
        @csrf
        <input required type="text" name="title" placeholder="Заголовок">
        <textarea required name="desk" placeholder="Описание" cols="40" rows="15"></textarea>
        <textarea name="comment" placeholder="Комментарий" cols="30" rows="8"></textarea>
        <div>
            <label for="station">Место:</label>
            <select required name="station" id="station">
                @foreach ($stations as $station)
                    <option value="{{$station->id}}">{{ $station->name }}</option>
                @endforeach
            </select>
        </div>
        <button>Создать</button>
    </form>
@endsection
