@extends('tevas')

@section('turinys')

<form method="POST" action="{{route('tags-destroy', ['id' => $tag->id])}}">
    <h1>Ar tikrai norite ištrinti <i>{{$tag->name}}</i></h1>
    @csrf
    @method('DELETE')
    <button type="submit">Taip</button>
    <a class="button cancel-button" href="{{route('tags-index', ['page' => $fromPage ?? 1])}}">Ne</a>
</form>
@endsection

@section('pavadinimas', 'Žymės trynimo patvirtinimas')
