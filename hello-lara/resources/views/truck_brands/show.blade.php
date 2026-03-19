@extends('tevas')

@section('turinys')
<div class="farm-container">
    <h1>{{$truckBrand->name}}</h1>
    <h2>Sunkvežimiai</h2>
    <ol class="list-group list-group-numbered">
        @foreach ($truckBrand->trucks as $truck)
        <li class="list-group-item">
            <span>{{ $truck->color }}</span>
            <span>{{ $truck->year }}</span>
            <span>{{ $truck->power }}AG</span>
            <span>{{ $truck->power_in_kilowatts }}kW</span>
            <a href="{{route('trucks-show', ['id' => $truck->id])}}" class="button button-show">Peržiūrėti</a>
        </li>
        @endforeach
    </ol>
    <a href="{{route('truck-brands-index', ['page' => $fromPage])}}" class="button cancel-button">Visi modeliai</a>
</div>

@endsection

@section('pavadinimas', 'Modelis')