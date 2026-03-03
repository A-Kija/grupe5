@extends('tevas')

@section('turinys')

<form method="POST" action="{{route('farm-update', ['id' => $animal->id])}}">
    <h1>Redaguoti gyvūlį fermoje</h1>
    <div>
        <label>Gyvulys:</label>
        <select name="animal">
            <option value="">Pasirinkti</option>
            @foreach($animals as $animalSelect)
                <option
                @if($animalSelect == $animal->animal) selected @endif
                value="{{$animalSelect}}">Gyvulys {{$animalSelect}}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Svoris Kg:</label>
        <input type="number" name="weight" step="0.01" value="{{$animal->weight}}">
    </div>
    @method('PUT')
    @csrf
    <button type="submit">Saugoti</button>
</form>
@endsection

@section('pavadinimas', 'Readguojamas gyvulys')