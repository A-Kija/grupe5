@extends('tevas')

@section('turinys')
<div class="farm-container">
    <div class="new-link"><a href="{{route('farm-create')}}">Naujas gyvulys</a></div>
    <div class="title">Visi gyvuliai Bendrai {{$weightSum}} Kg</div>
    
    <ul>
        @foreach ($animals as $animal)
        <li class="list-group-item">
            <div class="animal-item">
            {{ $animal->animal }} - {{ $animal->weight }} Kg
            </div>
            <div class="buttons">
                <a href="#" class="button button-edit">Redaguoti</a>
                <a href="#" class="button button-show">Peržiūrėti</a>
                <a href="{{route('farm-delete', ['id' => $animal->id])}}" class="button button-delete">Ištrinti</a>
            </div>
        </li>
        @endforeach
    </ul>
</div>

@endsection

@section('pavadinimas', 'Visa ferma')