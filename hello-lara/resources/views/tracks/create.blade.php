@extends('tevas')

@section('turinys')
{{--             
            $table->string('color');
            $table->unsignedInteger('power');
            $table->year('year');
            $table->unsignedBigInteger('truck_brand_id');
--}}

<form method="POST" action="{{route('trucks-store')}}">
    <h1>Pridėti naują sunkvežimį</h1>
    <div>
        <label>Spalva:</label>
        <input type="text"name="color" class="@error('color') is-invalid @enderror" value="{{old('color')}}">
        @error('color')
        <div class="small-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label>Galia (AG):</label>
        <input type="number"name="power" class="@error('power') is-invalid @enderror" value="{{old('power')}}">
        @error('power')
        <div class="small-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label>Metai:</label>
        <input type="number"name="year" class="@error('year') is-invalid @enderror" value="{{old('year')}}">
        @error('year')
        <div class="small-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label>Markė:</label>
        <select name="truck_brand_id" class="@error('truck_brand_id') is-invalid @enderror">
            <option value="">Pasirinkite markę</option>
            @foreach($truckBrands as $truckBrand)
                <option value="{{ $truckBrand->id }}" {{ old('truck_brand_id') == $truckBrand->id ? 'selected' : '' }}>{{ $truckBrand->name }}</option>
            @endforeach
        </select>
        @error('truck_brand_id')
        <div class="small-danger">{{ $message }}</div>
        @enderror
    </div>

    @csrf
    <button type="submit">Pridėti</button>
    <a href="{{route('trucks-index')}}" class="button cancel-button">Visi sunkvežimiai</a>
</form>
@endsection

@section('pavadinimas', 'Naujas sunkvežimis')