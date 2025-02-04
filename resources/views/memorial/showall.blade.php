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
                <h4 class="mb-0">Qr code list - Qty:{{ count($memorials) }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('download.bulk') }}" method="POST">
                    @csrf
                    <div class="container mt-4">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered">
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
                                                <!-- Проверяем статус -->
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="ids[]"
                                                            value="{{ $memorial->id }}" class="select-checkbox">
                                                    </td>
                                                    <td><img src="{{ asset('storage/' . $memorial->qr_code) }}"
                                                            height="50"></td>
                                                    <td>{{ $memorial->token }}</td>
                                                    <td>{{ $memorial->status }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary mt-3">Скачать выбранные</button>
                            </div>
                        </div>
                    </div>
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
