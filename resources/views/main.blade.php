@extends('layout.layout')

@section('page_title', 'Станции')

@section('content')
    @include('components.header')
    <h1 class="h1-title-request">Станции</h1>
    <section class="main">
        @foreach ($stations as $station)
            <a href="{{route('requests.listRequest',$station)}}" class="station">
                <h1>{{$station->name}}</h1>
            </a>
        @endforeach
    </section>

    @include('components.buttonAddRequest')

@endsection
