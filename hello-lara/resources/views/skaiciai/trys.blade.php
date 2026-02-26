@extends('tevas')

@section('turinys')
<form method="POST" action="{{route('apdorojimas-3')}}">
    <div>
        <label>Vienas skaičius:</label>
        <input type="number" name="skaicius1" value="{{ old('skaicius1') }}">
    </div>

    @csrf
    <button type="submit">Įdėti</button>
</form>
@endsection

@section('pavadinimas', 'Skaičių laukas')