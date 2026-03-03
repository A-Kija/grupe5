@extends('tevas')

@section('turinys')

<form method="POST" action="{{route('farm-destroy', ['id' => $animal->id])}}">
    <h1>Ar tikrai norite ištrinti <i>{{$animal->animal}}</i></h1>
    @csrf
    @method('DELETE')
    <button type="submit">Taip</button>
    <a class="button cancel-button" href="{{route('farm-read')}}">Ne</a>
</form>
@endsection

@section('pavadinimas', 'Gyvulio trynimo patvirtinimas')