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
                            <option value="">Harian</option>
                            <option value="">Bulanan</option>
                            <option value="">Tahunan</option>
                        </select>

                    </div>
                    <div class="col-4 text-end">
                        <button class="btn btn-dark">Kategori</button>
                        <button class="btn btn-outline-primary mx-2">
                            <i class="fas fa-print"></i>
                            Cetak
                        </button>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead class="text-center align-middle">
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Tanggal Penyetoran</th>
                                        <th colspan="2">Jamaah</th>
                                        <th colspan="2">Tabungan</th>
                                    </tr>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Nama Jamaah</th>
                                        <th>Deposit</th>
                                        <th>Saldo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center">01/01/2021</td>
                                        <td class="text-center">JAM001</td>
                                        <td class="text-center">Jamaah 1</td>
                                        <td class="text-center">Rp. 1.000.000</td>
                                        <td class="text-center">Rp. 1.000.000</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td class="text-center">01/01/2021</td>
                                        <td class="text-center">JAM002</td>
                                        <td class="text-center">Jamaah 2</td>
                                        <td class="text-center">Rp. 1.000.000</td>
                                        <td class="text-center">Rp. 1.000.000</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td class="text-center">01/01/2021</td>
                                        <td class="text-center">JAM003</td>
                                        <td class="text-center">Jamaah 3</td>
                                        <td class="text-center">Rp. 1.000.000</td>
                                        <td class="text-center">Rp. 1.000.000</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td class="text-center">01/01/2021</td>
                                        <td class="text-center">JAM004</td>
                                        <td class="text-center">Jamaah 4</td>
                                        <td class="text-center">Rp. 1.000.000</td>
                                        <td class="text-center">Rp. 1.000.000</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">5</td>
                                        <td class="text-center">01/01/2021</td>
                                        <td class="text-center">JAM005</td>
                                        <td class="text-center">Jamaah 5</td>
                                        <td class="text-center">Rp. 1.000.000
                                        </td>
                                        <td class="text-center">Rp. 1.000.000</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" class="text-center bg-light">Total</th>
                                        <th class="text-center">Rp. 5.000.000</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 text-end">
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-secondary">1</button>
                            <button type="button" class="btn btn-outline-secondary">2</button>
                            <button type="button" class="btn btn-primary active">3</button>
                            <button type="button" class="btn btn-outline-secondary">4</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection