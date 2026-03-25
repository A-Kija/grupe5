@extends('tevas')

@section('turinys')

<form method="POST" action="{{route('truck-brands-update', ['id' => $truckBrand->id])}}" enctype="multipart/form-data">
    <h1>Redaguoti modelį</h1>
    <div>
        <label>Modelis:</label>
        <input type="text" name="name" class="@error('name') is-invalid @enderror" value="{{old('name', $truckBrand->name)}}">
        @error('name')
        <div class="small-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label>Logotipas (neprivaloma):</label>
        <input type="file" name="logo_image" class="@error('logo_image') is-invalid @enderror">
        @error('logo_image')
        <div class="small-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        @if ($truckBrand->logo_image)
            <p>Dabartinis logotipas:</p>
            <img src="{{ asset($truckBrand->logo_image) }}" alt="{{ $truckBrand->name }} logotipas" width="100">
            <label class="with-cb"><input type="checkbox" name="remove_logo" value="1"> Pašalinti logotipą</label>
        
        @else
            <p>Nėra logotipo</p>
        @endif
    </div>
    @method('PUT')
    @csrf
    <button type="submit">Saugoti</button>
    <a href="{{route('truck-brands-index', ['page' => request()->query('from-page', 1)])}}" class="button cancel-button">Visi modeliai</a>
</form>
@endsection

@section('pavadinimas', 'Redaguojamas modelis')