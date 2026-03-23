@extends('tevas')

@section('turinys')

<form method="POST" action="{{route('tags-update', ['id' => $tag->id])}}">
    <h1>Redaguoti žymę</h1>
    <div>
        <label>Žymė:</label>
        <input type="text" name="name" class="@error('name') is-invalid @enderror" value="{{old('name', $tag->name)}}">
        @error('name')
        <div class="small-danger">{{ $message }}</div>
        @enderror
    </div>
    @method('PUT')
    @csrf
    <button type="submit">Saugoti</button>
    <a href="{{route('tags-index', ['page' => request()->query('from-page', 1)])}}" class="button cancel-button">Visos žymės</a>
</form>
@endsection

@section('pavadinimas', 'Redaguojama žymė')
