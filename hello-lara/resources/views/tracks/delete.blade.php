@extends('tevas')

@section('turinys')

<form method="POST" action="{{route('trucks-destroy', ['id' => $truck->id])}}">
    <h1>Ar tikrai norite ištrinti sunkvežimį?</h1>
    @csrf
    @method('DELETE')
    <button type="submit">Taip</button>
    <a class="button cancel-button" href="{{route('trucks-index', ['page' => request()->get('from-page', 1)])}}">Ne</a>
</form>
@endsection

@section('pavadinimas', 'Sunkvežimio trynimo patvirtinimas')