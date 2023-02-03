@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col-6">
                    <h4 style="font-weight: 600">Setting</h4>
                </div>
                <div class="col-6 text-end">
                    <h5>Admin / Setting Jamaah</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Manajemen Jamaah</h4>
                <p class="text-muted mb-0">Jika anda ingin menambahkan Jamaah baru, silahkan klik tombol tambah dibawah ini.</p>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-12">
                        <a href="/admin/setting/add-jamaah" class="btn btn-dark float-end">Tambah</a>
                    </div>
                </div>
                <table id="datatable" class="table table-bordered dt-responsive mt-5">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 25%">Kode</th>
                            <th style="width: 25%">Nama Jamaah</th>
                            <th style="width: 30%;">Alamat</th>
                            <th style="width: 10%;">Level</th>
                            <th style="width: 5%;">Edit</th>
                            <th style="width: 5%;">Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($member as $user)
                        <tr>
                            <td>{{ $user->code }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ ucfirst($user->saving_category[0]->name) }}</td>
                            <td class="text-center">
                                <a href="/admin/setting/add-jamaah?id={{ $user->id }}" class="btn btn-sm btn-outline-warning">
                                    <i class="fas fa-pen"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="/admin/setting/jamaah/{{ $user->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection