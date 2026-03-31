@extends('tevas')

@section('turinys')



<div class="farm-container">
    @auth
    <div class="new-link"><a href="{{route('trucks-create')}}">Naujas Sunkvežimis</a></div>
    @endauth
    <a class="button cancel-button" href="{{route('truck-brands-index')}}">Visi modeliai</a>
    <div class="title">Visi Sunkvežimiai</div>
    <div class="sort-options">
        <span>Rūšiuoti, filtruoti pagal:</span>
        <form id="sort-form" action="{{ route('trucks-index') }}" method="GET">
            <label for="sort">Rūšiuoti pagal:</label>
            <select name="sort" id="sort">
                <option value="">Nerūšiuoti</option>
                @foreach ($sortOptions as $key => $option)
                <option value="{{$key}}" {{ request('sort')===$key ? 'selected' : '' }}>
                    {{ $option }}
                </option>
                @endforeach
            </select>
            <label for="model">Filtruoti pagal modelį:</label>
            <select name="model" id="model">
                <option value="">Visi modeliai</option>
                @foreach ($trackBrands as $model)
                <option value="{{$model->id}}" {{ request('model')==$model->id ? 'selected': '' }}>
                    {{ $model->name }}
                </option>
                @endforeach
            </select>

            <div class="filter-tags">
                <label for="tag">Filtruoti pagal tagą:</label>
                <input data-auto-tag type="text" name="tag" id="tag" value="{{ request('tag') }}" placeholder="Įveskite tagą" autocomplete="off">
                <div class="auto-complete-suggestions">
                    <ul data-tag-suggestions-list data-url="{{ route('tags-suggestions') }}" style="display: none">
                    </ul>
                </div>
            </div>


            <label for="per_page">Rodyti po:</label>
            <select name="per_page" id="per_page">
                @foreach ($perPageOptions as $option)
                <option value="{{$option}}" {{ request('per_page')==$option ? 'selected' : '' }}>
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

                @auth
                <a href="{{route('trucks-edit', ['id' => $truck->id, 'from-page' => $trucks->currentPage()])}}"
                    class="button button-edit">Redaguoti</a>
                @endauth

                <a href="{{route('trucks-show', ['id' => $truck->id, 'from-page' => $trucks->currentPage()])}}"
                    class="button button-show">Peržiūrėti</a>

                @auth
                <a href="{{route('trucks-delete', ['id' => $truck->id, 'from-page' => $trucks->currentPage()])}}"
                    class="button button-delete">Ištrinti</a>
                @endauth

            </div>
            <div class="add-tags">
                @foreach ($truck->tags as $tag)
                <span class="tag">#{{ $tag->name }}</span>
                <form class="inline-small"
                    action="{{ route('tags-remove-from-truck', ['tag_id' => $tag->id, 'truck_id' => $truck->id]) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button small-remove">X</button>
                </form>
                @endforeach
                <form class="inline-small" action="{{ route('tags-add-to-truck', ['id' => $truck->id]) }}"
                    method="POST">
                    @csrf
                    <input type="text" name="tag_name" placeholder="Pridėti žymę" required>
                    <button type="submit" class="button button-add">+</button>
                </form>
            </div>
            {{-- images --}}
            <ul class="truck-images" data-sortable-images
                data-url="{{ route('trucks-update-images-order', ['id' => $truck->id]) }}">
                @foreach ($truck->orderedImages() as $image)
                <li class="truck-image-item" data-image-id="{{ $image->id }}">
                    <img src="{{ asset($image->image_path) }}" alt="Truck Image" class="truck-image">
                </li>
                @endforeach
            </ul>
        </li>
        @empty
        <li class="list-group-item">Nėra sunkvežimių</li>
        @endforelse
    </ul>
    {{ $trucks->onEachSide(1)->links() }} {{-- puslapių nuorodos --}}
</div>

@endsection

@section('pavadinimas', 'Visi Sunkvežimiai')