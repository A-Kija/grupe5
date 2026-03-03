@extends('tevas')

@section('turinys')
<div class="farm-container">
    <h1>{{$animal->animal}}</h1>
    <p>{{$animal->weight}} kg</p>
    <img style="width:{{$animal->weight * 5}}px;" src="{{asset('images/'. $animal->animal . '.jpg')}}">
</div>

@endsection

@section('pavadinimas', 'Gyvulys')