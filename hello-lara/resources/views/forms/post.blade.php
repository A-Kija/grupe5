@extends('tevas')

@section('turinys')
<form method="POST" action="{{ route('petro_rezultatas') }}">
    <div>
        <label for="digit1">First Digit:</label>
        <input type="number" id="digit1" name="digit1" min="0" max="1000" required>
    </div>

    <div>
        <label for="digit2">Second Digit:</label>
        <input type="number" id="digit2" name="digit2" min="0" max="1000" required>
    </div>
    @csrf
    <button type="submit">Submit</button>
</form>
@endsection

@section('pavadinimas', 'POST Form')