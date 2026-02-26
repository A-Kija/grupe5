@extends('tevas')

@section('turinys')

@if($rezultatas !== '')
<h1>
    <ul class="laukas">
        @foreach($rezultatas as $skaicius)
        <li>{{$skaicius}}</li>
        @endforeach
    </ul>
</h1>
<form method="POST" action="{{route('valom-lauka')}}">
    <button type="submit">Valyti</button>
    @csrf
</form>
@else
<h1>Rezultato dar nėra</h1>
@endif

@endsection

@section('pavadinimas', 'Skaičių lauko rezultatas')