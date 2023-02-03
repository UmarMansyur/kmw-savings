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
                <div class="row mt-2 mb-5">
                    <div class="col-6 col-sm-3 col-md-3 col-lg-3 col-xxl-3 col-xl-3 d-flex">
                        <input type="text" name="search" id="search" class="form-control">
                        <button class="btn btn-light">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <div class="col-1 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-7">

                    </div>
                    <div class="col-5 col-sm-3 col-md-3 col-lg-3 col-xxl-2 col-xl-3">
                        <select name="category" id="category" class="form-select">
                            <option value="">Semua Kategori</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead class="text-center align-middle">
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th colspan="3">JAMAAH</th>
                                        <th colspan="2">TABUNGAN</th>
                                        <th colspan="2">AKSI</th>
                                    </tr>
                                    <tr>
                                        <th> Kode </th>
                                        <th> Nama </th>
                                        <th> Alamat </th>
                                        <th>Kategori</th>
                                        <th>Saldo</th>
                                        <th>Preview</th>
                                        <th>Setoran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center">2020010001</td>
                                        <td class="text-center">Jamaah 1</td>
                                        <td class="text-start">Jl. Raya Sumenep</td>
                                        <td class="text-center">Tabungan 1</td>
                                        <td class="text-center">Rp. 100.000</td>
                                        <td class="text-center">
                                            <a href="" class="btn btn-outline-info"><i class="fas fa-eye"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-success">Setor</a>
                                        </td>
                                    </tr>

                                </tbody>
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