{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
    {{-- <h1>{{ $memorial->name }}</h1>
    @if($memorial->photo)
        <img src="{{ asset('storage/' . $memorial->photo) }}" alt="Фото">
    @endif
    <p>Date of birth: {{ $memorial->birth_date }}</p>
    <p>Date of death: {{ $memorial->death_date }}</p> --}}
{{-- @endsection --}}

@foreach ($memorials as $memorial)

        
    <img src="{{ asset('storage/' . $memorial->qr_code) }}" height="200" alt="">
    <p>{{ $memorial->token }} -


        @if ($memorial->memorial_id == 1)
            Foglalt
        @else
            Szabad
        @endif
    </p>

    <hr>

    <br><br>
@endforeach