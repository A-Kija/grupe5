@extends('tevas')

@section('turinys')
<div class="farm-container">
    <h1>{{$truck->model}}</h1>
    <div class="animal-item">
        {{ $truck->power }}AG ({{ $truck->power_in_kilowatts }}kW) {{ $truck->color }} {{ $truck->year }}
    </div>
    <div class="buttons">
        <a href="{{route('trucks-edit', ['id' => $truck->id, 'from-page' => request()->get('from-page', 1)])}}"
            class="button button-edit">Redaguoti</a>
        <a href="{{route('trucks-delete', ['id' => $truck->id, 'from-page' => request()->get('from-page', 1)])}}"
            class="button button-delete">Ištrinti</a>
        <a href="{{route('trucks-index', ['page' => request()->get('from-page', 1)])}}"
            class="button cancel-button">Visi sunkvežimiai</a>
    </div>

    {{-- images --}}
    <div class="swiper">
        <ul class="swiper-wrapper">
            @foreach ($truck->orderedImages() as $image)
            <li class="swiper-slide">
                <img src="{{ asset($image->image_path) }}" alt="Truck Image">
            </li>
            @endforeach
        </ul>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    @endsection

    @section('pavadinimas', 'Sunkvežimio informacija')