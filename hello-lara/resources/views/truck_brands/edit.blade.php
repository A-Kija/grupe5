@extends('tevas')

@section('turinys')

<form method="POST" action="{{route('truck-brands-update', ['id' => $truckBrand->id])}}">
    <h1>Redaguoti modelį</h1>
    <div>
        <label>Modelis:</label>
        <input type="text" name="name" class="@error('name') is-invalid @enderror" value="{{old('name', $truckBrand->name)}}">
        @error('name')
        <div class="small-danger">{{ $message }}</div>
        @enderror
    </div>
    @method('PUT')
    @csrf
    <button type="submit">Saugoti</button>
    <a href="{{route('truck-brands-index')}}" class="button button-show">Visi modeliai</a>
</form>
@endsection

@section('pavadinimas', 'Redaguojamas modelis')