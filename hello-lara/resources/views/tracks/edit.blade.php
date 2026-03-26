@extends('tevas')

@section('turinys')
{{--
$table->string('color');
$table->unsignedInteger('power');
$table->year('year');
$table->unsignedBigInteger('truck_brand_id');
--}}

<form method="POST" action="{{route('trucks-update', ['id' => $truck->id])}}" enctype="multipart/form-data">
    <h1>Redaguoti sunkvežimį</h1>
    <div>
        <label>Spalva:</label>
        <input type="text" name="color" class="@error('color') is-invalid @enderror"
            value="{{old('color', $truck->color)}}">
        @error('color')
        <div class="small-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label>Galia (AG):</label>
        <input type="number" name="power" class="@error('power') is-invalid @enderror"
            value="{{old('power', $truck->power)}}">
        @error('power')
        <div class="small-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label>Metai:</label>
        <input type="number" name="year" class="@error('year') is-invalid @enderror"
            value="{{old('year', $truck->year)}}">
        @error('year')
        <div class="small-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label>Markė:</label>
        <select name="truck_brand_id" class="@error('truck_brand_id') is-invalid @enderror">
            <option value="">Pasirinkite markę</option>
            @foreach($truckBrands as $truckBrand)
            <option value="{{ $truckBrand->id }}" {{ old('truck_brand_id', $truck->truck_brand_id) == $truckBrand->id ?
                'selected' : '' }}>{{ $truckBrand->name }}</option>
            @endforeach
        </select>
        @error('truck_brand_id')
        <div class="small-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="image-upload-section">
        <label>Nuotraukos:</label>
        <div data-gallery class="images-inputs">
            <div data-master class="image-input">
                <input type="file" name="images[]">
                <button type="button" class="remove-image-button" data-remove>-</button>
            </div>

            @foreach ($truck->images as $item)
            <div data-input class="image-input">
                <img src="{{ asset($item->image_path) }}" alt="Truck Image">
                <input type="file" name="images[]">
                <input type="hidden" name="existing_images[]" value="{{ $item->id }}"> 
                {{-- Saugoti informaciją apie esamas nuotraukas --}}
                <button type="button" class="remove-image-button" data-remove>-</button>
            </div>
            @endforeach
        </div>
        <button type="button" class="add-image-button" data-add-image>Pridėti nuotrauką</button>
    </div>

    @method('PUT') {{-- HTML formos nepalaiko PUT metodo, todėl naudojame šį būdą --}}
    @csrf
    <button type="submit">Išsaugoti</button>
    <a href="{{route('trucks-index', ['page' => request()->get('from-page', 1)])}}" class="button cancel-button">Visi
        sunkvežimiai</a>
</form>
@endsection

@section('pavadinimas', 'Redaguoti sunkvežimį')