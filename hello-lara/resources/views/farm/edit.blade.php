@extends('tevas')

@section('turinys')

<form method="POST" action="{{route('farm-update', ['id' => $animal->id])}}">
    <h1>Redaguoti gyvūlį fermoje</h1>
    <div>
        <label>Gyvulys:</label>
        <select name="animal" class="@error('animal') is-invalid @enderror">
            <option value="">Pasirinkti</option>
            @foreach($animals as $animalSelect)
                <option
                @if($animalSelect == old('animal', $animal->animal)) selected @endif
                value="{{$animalSelect}}">Gyvulys {{$animalSelect}}</option>
            @endforeach
        </select>
        @error('animal')
        <div class="small-danger">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label>Svoris Kg:</label>
        <input type="number" name="weight" step="0.01" value="{{old('weight', $animal->weight)}}" class="@error('weight') is-invalid @enderror">
        @error('weight')
        <div class="small-danger">{{ $message }}</div>
        @enderror
    </div>
    @method('PUT')
    @csrf
    <button type="submit">Saugoti</button>
</form>
@endsection

@section('pavadinimas', 'Redaguojamas gyvulys')