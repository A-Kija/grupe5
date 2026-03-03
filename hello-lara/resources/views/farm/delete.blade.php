@extends('tevas')

@section('turinys')

<form method="POST" action="{{route('farm-destroy', ['id' => $id])}}">
    <h1>Ar tikrai norite ištrinti</h1>
    @csrf
    @method('DELETE')
    <button type="submit">Taip</button>
    <a class="button cancel-button" href="{{route('farm-read')}}">Ne</a>
</form>
@endsection

@section('pavadinimas', 'Gyvulio trynimo patvirtinimas')