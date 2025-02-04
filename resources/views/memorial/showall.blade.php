<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Qr code list {{ count($memorials) }}</h4>
            </div>
            <div class="card-body">
                <form id="memorials-form" action="" method="POST">
                    @csrf

                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>
                                    <input type="checkbox" id="select-all">
                                </th>
                                <th>#</th>
                                <th>QR-код</th>
                                <th>Token</th>
                                <th>Memorial ID</th>
                                <th>Status</th>
                                <th>Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($memorials as $index => $memorial)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="selected[]" value="{{ $memorial->id }}"
                                            class="select-checkbox">
                                    </td>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $memorial->qr_code) }}" height="100"
                                            alt="QR Code">
                                    </td>
                                    <td>{{ $memorial->token }}</td>
                                    <td>{{ $memorial->memorial_id }}</td>
                                    <td>{{ $memorial->status }}</td>
                                    <td>
                                        <a href="{{ asset('storage/' . $memorial->qr_code) }}" download
                                            class="btn btn-success btn-sm">
                                            Download
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <button type="submit" class="btn btn-danger mt-2">
                        Download All
                    </button>



                </form>

                <form action="{{ route('run.seed') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">DB Seed</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
