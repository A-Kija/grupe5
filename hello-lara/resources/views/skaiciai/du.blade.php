@extends('tevas')

@section('turinys')
<form method="POST" action="{{route('apdorojimas-2')}}">
    <div>
        <label>Vienas skaičius:</label>
        <input type="number" name="skaicius1" value="{{ old('skaicius1') }}">
    </div>

    <div>
        <label>Kitas skaičius:</label>
        <input type="number"name="skaicius2" value="{{ old('skaicius2') }}">
    </div>
    @csrf
    <button type="submit">Sumuoti</button>
</form>
@endsection

@section('pavadinimas', 'Dviejų skaičių suma')