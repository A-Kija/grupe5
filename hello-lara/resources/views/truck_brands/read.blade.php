@extends('tevas')

@section('turinys')
<div class="farm-container">
    <div class="new-link"><a href="{{route('truck-brands-create')}}">Naujas Modelis</a></div>
    <div class="title">Visi Modeliai</div>    
    <ul>
        @foreach ($truckBrands as $truckBrand)
        <li class="list-group-item">
            <div class="animal-item">
            {{ $truckBrand->name }}
            </div>
            <div class="buttons">
                <a href="{{route('truck-brands-edit', ['id' => $truckBrand->id])}}" class="button button-edit">Redaguoti</a>
                <a href="{{route('truck-brands-show', ['id' => $truckBrand->id])}}" class="button button-show">Peržiūrėti</a>
                <a href="{{route('truck-brands-delete', ['id' => $truckBrand->id])}}" class="button button-delete">Ištrinti</a>
            </div>
        </li>
        @endforeach
    </ul>
    {{ $truckBrands->onEachSide(1)->links() }} {{-- puslapių nuorodos --}}
</div>

@endsection

@section('pavadinimas', 'Visi Modeliai')