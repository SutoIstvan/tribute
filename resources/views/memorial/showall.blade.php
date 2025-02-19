@extends('layouts.home')

@section('title', 'Qr code list - mbook.hu')

@section('css')
    <style>
        .pricing-pg .item {
            padding: 45px;
            background: var(--bg-color);
        }
    </style>
@endsection

@section('content')
    <!-- ==================== Start Header ==================== -->





    <!-- ==================== Start Header ==================== -->

    <header class="pricing-hed">
        <div class="container section-padding">
            <div class="caption text-center">
                <h1>Qr code list</h1>
            </div>
        </div>
    </header>

    <!-- ==================== End Header ==================== -->

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    <!-- ==================== Start Pricing ==================== -->

    <section class="pricing-pg ">
        <div class="container">
            <div class="card bg-dark text-white border-secondary">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">QR Code List - Qty: {{ count($memorials) }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('download.bulk') }}" method="POST">
                        @csrf
                        <div class="container mt-4">
                            <div class="card bg-dark text-white border-secondary">
                                <div class="card-body">
                                    <table class="table table-bordered table-dark border-secondary">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="select-all"></th>
                                                <th>QR Code</th>
                                                <th>Token</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($memorials as $memorial)
                                                @if ($memorial->status !== 'downloaded')
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="ids[]" value="{{ $memorial->id }}" class="select-checkbox">
                                                        </td>
                                                        <td><img src="{{ asset('storage/' . $memorial->qr_code) }}" style="height: 150px !important; width: 150px !important;"></td>
                                                        <td>{{ $memorial->token }}</td>
                                                        <td>
                                                            <a href="/memorial/attach/{{ $memorial->token }}" class="text-info">Mobile scan</a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-outline-light mt-3">Download Selected QR Codes</button>
                                </div>
                            </div>
                        </div>
                    </form>
            
                    <form action="{{ route('run.seed') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-light mt-2">Generate 10 QR Codes - DB Seed</button>
                    </form>
                </div>
            </div>
            
        </div>
    </section>
@endsection

@section('js')
<script>
    document.getElementById('select-all').addEventListener('change', function () {
        let checkboxes = document.querySelectorAll('.select-checkbox');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });
</script>
@endsection
