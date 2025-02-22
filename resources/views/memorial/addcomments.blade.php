@extends('layouts.home')

@section('title', ' - mbook.hu')

@section('content')
    <!-- ==================== Start Header ==================== -->


    <section class="testimonials-dm section-padding pb-80 ">
        <div class="container">
            <div class="sec-head mb-100">
                <div class="row">
                    <div class="col-lg-5">
                        <h6 class="sub-head">Amit a család mond</h6>
                    </div>
                    <div class="col-lg-7">
                        <h3 class="text-indent">Legfrissebb megjegyzések <br>rokonoktól és szeretteinktől
                        </h3>

                    </div>
                </div>
            </div>

            

            <form action="{{ route('comments.store', $memorial->id) }}" method="POST" class="space-y-4  rounded-lg shadow">
                @csrf

                
                    <div class="mb-3">
                        <label for="name" class="form-label text-light">Nev</label>
                        <input type="text" 
                               name="name" 
                               id="name" 
                               required 
                               class="form-control bg-dark text-light border-secondary focus:ring-blue-500 focus:border-blue-500 @error('name') is-invalid @enderror" 
                               value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="mb-3">
                        <label for="content" class="form-label text-light">Megjegyzés</label>
                        <textarea name="content" 
                                  id="content" 
                                  rows="4" 
                                  required 
                                  class="form-control bg-dark text-light border-secondary focus:ring-blue-500 focus:border-blue-500 @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <button type="submit" 
                            class="btn btn-primary w-full md:w-auto">
                            Elküld
                    </button>
            </form>





        </div>
    </section>

    <!-- ==================== End Testimonials ==================== -->
@endsection
