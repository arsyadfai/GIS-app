<!-- resources/views/year/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pilih Tahun</h2>
    <form action="#" method="POST">
        @csrf
        <label for="year">Tahun:</label>
        <select name="year" id="year" class="form-control">
            <option value="">-- Pilih Tahun --</option>
            @foreach($years as $year)
                <option value="{{ $year->tahun }}">{{ $year->tahun }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>
@endsection
