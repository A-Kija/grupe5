@extends('tevas')

@section('turinys')

<form method="POST" action="{{route('tags-store')}}">
    <h1>Pridėti naują žymę</h1>
    <div>
        <label>Žymė:</label>
        <input type="text" name="name" class="@error('name') is-invalid @enderror" value="{{old('name')}}">
        @error('name')
        <div class="small-danger">{{ $message }}</div>
        @enderror
    </div>
    @csrf
    <button type="submit">Pridėti</button>
    <a href="{{route('tags-index')}}" class="button cancel-button">Visos žymės</a>
</form>
@endsection

@section('pavadinimas', 'Nauja žymė')
