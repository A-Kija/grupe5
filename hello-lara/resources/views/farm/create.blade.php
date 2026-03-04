@extends('tevas')

@section('turinys')

<form method="POST" action="{{route('farm-store')}}">
    <h1>Pridėti naują gyvulį į fermą</h1>
    <div>
        <label>Gyvulys:</label>
        <select name="animal" class="@error('animal') is-invalid @enderror">
            <option value="">Pasirinkti</option>
            @foreach($animals as $animal)
                <option value="{{$animal}}" @if(old('animal') == $animal) selected @endif>Gyvulys {{$animal}}</option>
            @endforeach
        </select>
        @error('animal')
        <div class="small-danger">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label>Svoris Kg:</label>
        <input type="number" class="@error('weight') is-invalid @enderror" name="weight" step="0.01" value="{{ old('weight') }}">
        @error('weight')
        <div class="small-danger">{{ $message }}</div>
        @enderror
    </div>
    @csrf
    <button type="submit">Pridėti</button>
</form>
@endsection

@section('pavadinimas', 'Naujas gyvulys')