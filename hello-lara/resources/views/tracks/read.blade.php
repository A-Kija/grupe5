@extends('tevas')

@section('turinys')
<div class="farm-container">
    <div class="new-link"><a href="{{route('trucks-create')}}">Naujas Sunkvežimis</a></div>
    <div class="title">Visi Sunkvežimiai</div>    
    <ul>
        @foreach ($trucks as $truck)
        <li class="list-group-item">
            <div class="animal-item">
            {{ $truck->power }}AG {{ $truck->color }} {{ $truck->year }} {{ $truck->truck_brand_id }}
            </div>
            <div class="buttons">
                <a href="{{route('trucks-edit', ['id' => $truck->id, 'from-page' => $trucks->currentPage()])}}" class="button button-edit">Redaguoti</a>
                <a href="{{route('trucks-show', ['id' => $truck->id, 'from-page' => $trucks->currentPage()])}}" class="button button-show">Peržiūrėti</a>
                <a href="{{route('trucks-delete', ['id' => $truck->id, 'from-page' => $trucks->currentPage()])}}" class="button button-delete">Ištrinti</a>
            </div>
        </li>
        @endforeach
    </ul>
    {{ $trucks->onEachSide(1)->links() }} {{-- puslapių nuorodos --}}
</div>

@endsection

@section('pavadinimas', 'Visi Sunkvežimiai')