@extends('layout.layout')

{{-- @section('page_title', $getNameStation->name) --}}

@include('components.header')

@section('content')
    {{-- <h1 class="h1-title-request">Станция {{ $getNameStation->name }}</h1> --}}

    <section class="main get-request">

        <div class="filter">
            <form action="{{ route('requests.sort') }}" method="get">
                <div>
                    <label for="sort_status">По статусу:</label>
                    <select name="sort_status" id="sort_status">
                        <option value="в ожидании">В ожидании</option>
                        <option value="в работе">В работе</option>
                        <option value="завершено">Завершено</option>
                    </select>
                </div>
                <div>
                    <label for="sort_date">По дате:</label>
                    <select name="sort_date" id="sort_date">
                        <option value="new">Новые</option>
                        <option value="old">Старые</option>
                    </select>
                </div>
                <div>
                    <label for="">Место:</label>
                    <select name="sort_station_name" id="">
                        @foreach ($getStations->all() as $station)
                            <option value="{{ $station->name }}">{{ $station->name }}</option>
                        @endforeach
                        {{-- <option value="">Метро</option>
                        <option value="">Депо</option>
                        <option value="">Управление</option> --}}
                    </select>
                </div>

                <button>Отсортировать</button>
            </form>
        </div>

        @if (empty($getRequests->all()))
            <h1>По вашему запросу ничего не найдено</h1>
        @else
            @foreach ($getRequests as $getRequest)
                <a href="{{ route('requests.single', $getRequest) }}" class="station">
                    <h3 class="title">{{ $getRequest->title }}</h2>
                        @if ($getRequest->status == 'в работе')
                            <p class="status work">Статус: {{ $getRequest->status }}</p>
                        @elseif ($getRequest->status == 'в ожидании')
                            <p class="status wait">Статус: {{ $getRequest->status }}</p>
                        @elseif($getRequest->status == 'завершено')
                            <p class="status complete">Статус: {{ $getRequest->status }}</p>
                        @endif
                        <p class="from-who">От: {{ $getRequest->service }}</p>
                        <p class="date-request">Дата: {{ $getRequest->created_at }}</p>
                </a>
            @endforeach
        @endif


        {{ $getRequests->links('components.paginate') }}

    </section>

    @include('components.buttonAddRequest')
@endsection
