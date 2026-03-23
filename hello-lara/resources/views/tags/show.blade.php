@extends('tevas')

@section('turinys')
<div class="farm-container">
    <h1>{{$tag->name}}</h1>
    <h2>Sunkvežimiai su šia žyme</h2>
    <ol class="list-group list-group-numbered">
        @forelse ($tag->trucks as $truck)
        <li class="list-group-item">
            <span>{{ $truck->color }}</span>
            <span>{{ $truck->year }}</span>
            <span>{{ $truck->power }}AG</span>
            <span>{{ $truck->power_in_kilowatts }}kW</span>
            <a href="{{route('trucks-show', ['id' => $truck->id])}}" class="button button-show">Peržiūrėti</a>
        </li>
        @empty
        <li class="list-group-item">Nėra priskirtų sunkvežimių</li>
        @endforelse
    </ol>
    <a href="{{route('tags-index', ['page' => $fromPage])}}" class="button cancel-button">Visos žymės</a>
</div>

@endsection

@section('pavadinimas', 'Žymė')
