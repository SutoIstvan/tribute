{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
    <h1>{{ $memorial->name }}</h1>
    @if($memorial->photo)
        <img src="{{ asset('storage/' . $memorial->photo) }}" alt="Фото">
    @endif
    <p>Date of birth: {{ $memorial->birth_date }}</p>
    <p>Date of death: {{ $memorial->death_date }}</p>
{{-- @endsection --}}
