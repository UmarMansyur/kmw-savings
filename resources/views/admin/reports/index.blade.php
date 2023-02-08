@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col-6">
                    <h4 style="font-weight: 600">Tabungan</h4>
                </div>
                <div class="col-6 text-end">
                    <h5>Admin / Tabungan</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5>Laporan Tabungan</h5>
                <div class="text-muted">
                    Untuk memilih jenis laporan tabungan, silahkan pilih jenis laporan yang diinginkan.
                </div>
            </div>
            <div class="card-body">
                <div class="row mt-2 justify-content-between">
                    <div class="col-6 col-md-3 col-xxl-3 col-sm-3 col-lg-3 col-xl-3 float-end">
                        <select name="typeReport" id="typeReport" class="form-select">
                            <option value="" class="text-center">--- Pilih Jenis Perekapan ---</option>
                            <option value="1" {{ request()->get('type') == 'harian' ? 'selected' : '' }}>Harian</option>
                            <option value="2" {{ request()->get('type') == 'bulanan' ? 'selected' : '' }}>Bulanan
                            </option>
                            <option value="3" {{ request()->get('type') == 'tahunan' ? 'selected' : '' }}>Tahunan
                            </option>
                        </select>
                    </div>
                    <div class="col text-end">
                        @if (request()->get('type') == 'harian')
                        <a target="_blank" href="/admin/report/print?type=harian" class="btn btn-dark">
                            <i class="fas fa-print"></i>
                            Cetak
                        </a>
                        @elseif (request()->get('type') == 'bulanan')
                        <a target="_blank" href="/admin/report/print?type=bulanan" class="btn btn-dark">
                            <i class="fas fa-print"></i>
                            Cetak
                        </a>
                        @elseif (request()->get('type') == 'tahunan')
                        <a target="_blank" href="/admin/report/print?type=tahunan" class="btn btn-dark">
                            <i class="fas fa-print"></i>
                            Cetak
                        </a>
                        @else
                        <a target="_blank" href="/admin/report/print" class="btn btn-dark">
                            <i class="fas fa-print"></i>
                            Cetak
                        </a>
                        @endif
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
        </div>
    </div>
</div>
@endsection