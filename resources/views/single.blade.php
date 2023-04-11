@extends('layout.layout')

@section('page_title', $SingleRequest->title)

@include('components.header')

@section('content')
    <section class="single-request">
        <div>
            <div>
                <h1>{{ $SingleRequest->title }}</h1>
                <p class="desk">Описание: {{ $SingleRequest->desk }}</p>
                <p class="comment">Комментарий: {{ $SingleRequest->comment }}</p>

                @if ($SingleRequest->status == 'в ожидании')
                    <a href="{{ route('requests.towork', $SingleRequest->id) }}"><button>Принять в работу</button></a>
                @elseif ($SingleRequest->status == 'в работе')
                    <a href="{{ route('requests.towork', $SingleRequest->id) }}"><button>Завершить работу</button></a>
                @elseif ($SingleRequest->status == 'завершено')
                    <a href="{{ route('requests.towork', $SingleRequest->id) }}"><button>Обратно в работу</button></a>
                @endif

            </div>
            <div>
                <p class="date-create">Дата создания: {{ $SingleRequest->create }}</p>
                @if ($SingleRequest->status === 'в работе')
                    <p class="status work">Статус: {{ $SingleRequest->status }}</p>
                @elseif($SingleRequest->status === 'в ожидании')
                    <p class="status wait">Статус: {{ $SingleRequest->status }}</p>
                @elseif($SingleRequest->status === 'завершено')
                    <p class="status complete">Статус: {{ $SingleRequest->status }}</p>
                @endif
                <p class="station-name">
                    Место: {{ $SingleRequest->station_name }}
                </p>
                <p class="service">От: {{ $SingleRequest->user_name }}</p>
                <p class="number-phone">Номер телефона: {{ $SingleRequest->user_number }}</p>
            </div>
        </div>
    </section>

    @include('components.buttonAddRequest')
@endsection
