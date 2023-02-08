<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-12">
                <h3 class="text-center">LAPORAN TABUNGAN</h3>

            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered" id="datatable">
                        <thead class="text-center align-middle">
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Waktu</th>
                                <th colspan="2">Jamaah</th>
                                <th colspan="2">Tabungan</th>
                            </tr>
                            <tr>
                                <th>Kode</th>
                                <th>Nama Jamaah</th>
                                <th>Debit</th>
                                <th>Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <th class="text-center">{{ $loop->iteration }}</th>
                                @if (request()->get('type') == 'harian')
                                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                @elseif (request()->get('type') == 'bulanan')
                                <td>{{ $item->bulan . '-' . $item->year }}</td>
                                @elseif (request()->get('type') == 'tahunan')
                                <td class="text-center">{{ $item->year }}</td>
                                @else
                                <td class="text-center">{{ $item->created_at->format('d-m-Y') }}</td>
                                @endif
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->name }}</td>
                                <td>Rp. {{ number_format($item->debit, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($item->saldo, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    // closing after ptint
    window.addEventListener("load", window.print());
    window.addEventListener("afterprint", function(event) {
        window.close();
    });
</script>

</html>