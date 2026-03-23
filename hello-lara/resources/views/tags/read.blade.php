@extends('tevas')

@section('turinys')
<div class="farm-container">
    <div class="new-link"><a href="{{route('tags-create')}}">Nauja Žymė</a></div>
    <a class="button cancel-button" href="{{route('trucks-index')}}">Visi sunkvežimiai</a>
    <div class="title">Visos Žymės</div>
    <ul>
        @foreach ($tags as $tag)
        <li class="list-group-item">
            <div class="animal-item">
                {{ $tag->name }}
                ({{ $tag->trucks()->count() }})
            </div>
            <div class="buttons">
                <a href="{{route('tags-edit', ['id' => $tag->id, 'from-page' => $tags->currentPage()])}}" class="button button-edit">Redaguoti</a>
                <a href="{{route('tags-show', ['id' => $tag->id, 'from-page' => $tags->currentPage()])}}" class="button button-show">Peržiūrėti</a>
                <a href="{{route('tags-delete', ['id' => $tag->id, 'from-page' => $tags->currentPage()])}}" class="button button-delete">Ištrinti</a>
            </div>
        </li>
        @endforeach
    </ul>
    {{ $tags->onEachSide(1)->links() }}
</div>

@endsection

@section('pavadinimas', 'Visos Žymės')
