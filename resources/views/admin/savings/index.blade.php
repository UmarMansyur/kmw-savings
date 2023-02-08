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
                <h5>Data Tabungan</h5>
                <div class="text-muted">
                    Untuk melihat data tabungan, silahkan pilih kategori tabungan yang diinginkan.
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered" id="datatable">
                                <thead class="text-center align-middle fw-bold">
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th colspan="3">JAMAAH</th>
                                        <th colspan="2">TABUNGAN</th>
                                        <th colspan="2">AKSI</th>
                                    </tr>
                                    <tr>
                                        <th style="width: 15%"> Kode </th>
                                        <th> Nama </th>
                                        <th> Alamat </th>
                                        <th>Kategori</th>
                                        <th>Saldo</th>
                                        <th>Preview</th>
                                        <th>Setoran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($members as $member)
                                    <tr>
                                        <td class="text-center"> {{ $loop->iteration }} </td>
                                        <td> {{ $member->code }} </td>
                                        <td> {{ $member->name }} </td>
                                        <td> {{ $member->address }} </td>
                                        <td> {{ ucfirst($member->category) }} </td>
                                        @isset($member->saldo)
                                        <td
                                            class="{{ $member->saldo >= $member->batas ? 'text-success' : 'text-danger' }}">
                                            Rp. {{ number_format($member->saldo, 0, ',', '.')}}
                                        </td>
                                        @else
                                        <td>Rp. 0</td>
                                        @endisset
                                        <td class="text-center">
                                            <a href="/admin/saving/preview/{{$member->id}}"
                                                class="btn btn-outline-primary btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>

                                        <td class="text-center">
                                            @if ($member->saldo >= $member->batas)
                                            <a href="#" class="btn btn-secondary btn-sm disabled">Setor</a>
                                            @else
                                            <a href="/admin/saving/deposit/{{$member->id}}"
                                                class="btn btn-success btn-sm">Setor</a>
                                            @endif
                                        </td>
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