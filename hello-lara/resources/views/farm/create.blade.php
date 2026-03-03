@extends('tevas')

@section('turinys')

<form method="POST" action="{{route('farm-store')}}">
    <h1>Pridėti naują gyvulį į fermą</h1>
    <div>
        <label>Gyvulys:</label>
        <select name="animal">
            <option value="">Pasirinkti</option>
            @foreach($animals as $animal)
                <option value="{{$animal}}">Gyvulys {{$animal}}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Svoris Kg:</label>
        <input type="number" name="weight" step="0.01" value="{{ old('weight') }}">
    </div>
    @csrf
    <button type="submit">Pridėti</button>
</form>
@endsection

@section('pavadinimas', 'Naujas gyvulys')