@extends('tevas')

@section('turinys')

@if($rezultatas !== '')
<h1>{{ $skaicius1 }} <span class="red">+</span> {{ $skaicius2 }} = {{ $rezultatas }}</h1>
@else
<h1>Rezultato dar nėra</h1>
@endif

@endsection

@section('pavadinimas', 'Dviejų skaičių rezultatas')