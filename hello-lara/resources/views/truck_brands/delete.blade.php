@extends('tevas')

@section('turinys')

<form method="POST" action="{{route('truck-brands-destroy', ['id' => $truckBrand->id])}}">
    <h1>Ar tikrai norite ištrinti <i>{{$truckBrand->name}}</i></h1>
    @csrf
    @method('DELETE')
    <button type="submit">Taip</button>
    <a class="button cancel-button" href="{{route('truck-brands-index')}}">Ne</a>
</form>
@endsection

@section('pavadinimas', 'Modelio trynimo patvirtinimas')