@extends('tevas')

@section('turinys')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{route('apdorojimas-2')}}">
    <div>
        <label>Vienas skaičius:</label>
        <input type="number" name="skaicius1">
    </div>

    <div>
        <label>Kitas skaičius:</label>
        <input type="number"name="skaicius2">
    </div>
    @csrf
    <button type="submit">Sumuoti</button>
</form>
@endsection

@section('pavadinimas', 'Dviejų skaičių suma')