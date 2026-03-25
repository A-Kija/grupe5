@extends('tevas')

@section('turinys')

<form method="POST" action="{{route('truck-brands-store')}}" enctype="multipart/form-data">
    <h1>Pridėti naują modelį</h1>
    <div>
        <label>Modelis:</label>
        <input type="text"name="name" class="@error('name') is-invalid @enderror" value="{{old('name')}}">
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
    @csrf
    <button type="submit">Pridėti</button>
    <a href="{{route('truck-brands-index')}}" class="button cancel-button">Visi modeliai</a>
</form>
@endsection

@section('pavadinimas', 'Naujas modelis')