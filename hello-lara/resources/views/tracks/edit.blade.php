@extends('tevas')

@section('turinys')
{{--             
            $table->string('color');
            $table->unsignedInteger('power');
            $table->year('year');
            $table->unsignedBigInteger('truck_brand_id');
--}}

<form method="POST" action="{{route('trucks-update', ['id' => $truck->id])}}">
    <h1>Redaguoti sunkvežimį</h1>
    <div>
        <label>Spalva:</label>
        <input type="text"name="color" class="@error('color') is-invalid @enderror" value="{{old('color', $truck->color)}}">
        @error('color')
        <div class="small-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label>Galia (AG):</label>
        <input type="number"name="power" class="@error('power') is-invalid @enderror" value="{{old('power', $truck->power)}}">
        @error('power')
        <div class="small-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label>Metai:</label>
        <input type="number"name="year" class="@error('year') is-invalid @enderror" value="{{old('year', $truck->year)}}">
        @error('year')
        <div class="small-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label>Markė:</label>
        <select name="truck_brand_id" class="@error('truck_brand_id') is-invalid @enderror">
            <option value="">Pasirinkite markę</option>
            @foreach($truckBrands as $truckBrand)
                <option value="{{ $truckBrand->id }}" {{ old('truck_brand_id', $truck->truck_brand_id) == $truckBrand->id ? 'selected' : '' }}>{{ $truckBrand->name }}</option>
            @endforeach
        </select>
        @error('truck_brand_id')
        <div class="small-danger">{{ $message }}</div>
        @enderror
    </div>
    @method('PUT') {{-- HTML formos nepalaiko PUT metodo, todėl naudojame šį būdą --}}
    @csrf
    <button type="submit">Išsaugoti</button>
    <a href="{{route('trucks-index', ['page' => request()->get('from-page', 1)])}}" class="button cancel-button">Visi sunkvežimiai</a>
</form>
@endsection

@section('pavadinimas', 'Redaguoti sunkvežimį')