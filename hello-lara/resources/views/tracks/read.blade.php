@extends('tevas')

@section('turinys')
<div class="farm-container">
    <div class="new-link"><a href="{{route('trucks-create')}}">Naujas Sunkvežimis</a></div>
    <a class="button cancel-button" href="{{route('truck-brands-index')}}">Visi modeliai</a>
    <div class="title">Visi Sunkvežimiai</div>
    <div class="sort-options">
        <span>Rūšiuoti, filtruoti pagal:</span>
        <form id="sort-form" action="{{ route('trucks-index') }}" method="GET">
            <select name="sort">
                <option value="">Nerūšiuoti</option>
                @foreach ($sortOptions as $key => $option)
                <option value="{{$key}}" {{ request('sort')===$key ? 'selected': '' }}>
                    {{ $option }}
                </option>
                @endforeach
            </select>
            <select name="model">
                <option value="">Visi modeliai</option>
                @foreach ($trackBrands as $model)
                <option value="{{$model->id}}" {{ request('model')==$model->id ? 'selected': '' }}>
                    {{ $model->name }}
                </option>
                @endforeach
            </select>
            <select name="per_page">
                @foreach ($perPageOptions as $option)
                <option value="{{$option}}" {{ request('per_page')==$option ? 'selected': '' }}>
                    Rodyti po {{$option}}
                </option>
                @endforeach
            </select>
            <button type="submit" class="button button-sort">Taikyti</button>
        </form>
    </div>


    <ul>
        @forelse ($trucks as $truck)
        <li class="list-group-item">
            <div class="animal-item">
                {{ $truck->power }}AG ({{ $truck->power_in_kilowatts }}kW) {{ $truck->color }} {{ $truck->year }} {{
                $truck->model }}
            </div>
            <div class="buttons">
                <a href="{{route('trucks-edit', ['id' => $truck->id, 'from-page' => $trucks->currentPage()])}}"
                    class="button button-edit">Redaguoti</a>
                <a href="{{route('trucks-show', ['id' => $truck->id, 'from-page' => $trucks->currentPage()])}}"
                    class="button button-show">Peržiūrėti</a>
                <a href="{{route('trucks-delete', ['id' => $truck->id, 'from-page' => $trucks->currentPage()])}}"
                    class="button button-delete">Ištrinti</a>
            </div>
        </li>
        @empty
        <li class="list-group-item">Nėra sunkvežimių</li>
        @endforelse
    </ul>
    {{ $trucks->onEachSide(1)->links() }} {{-- puslapių nuorodos --}}
</div>

@endsection

@section('pavadinimas', 'Visi Sunkvežimiai')