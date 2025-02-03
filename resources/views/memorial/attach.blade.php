{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
<h2>QR code linking</h2>
 <form method="POST" action="{{ route('memorial.attach') }}" enctype="multipart/form-data">
 @csrf
 <input type="hidden" name="token" value="{{ $token }}">

 <label>Name:</label>
 <input type="text" name="name" required>

 <label>Date of birth:</label>
 <input type="date" name="birth_date">

 <label>Date of death:</label>
 <input type="date" name="death_date">

 <label>Photo:</label>
 <input type="file" name="photo">

 <button type="submit">Snap QR code</button>
 </form>
{{-- @endsection --}}
