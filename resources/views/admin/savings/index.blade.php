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
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-12">
                        <a href="/admin/setting/add-karyawan" class="btn btn-dark float-end">Tambah</a>
                    </div>
                </div>
                <table id="datatable" class="table table-bordered dt-responsive mt-5">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 25%">Nama Karyawan</th>
                            <th style="width: 25%">Email</th>
                            <th style="width: 30%;">Alamat</th>
                            <th style="width: 10%;">Role</th>
                            <th style="width: 5%;">Edit</th>
                            <th style="width: 5%;">Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employes as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->role[0]->name }}</td>
                            <td class="text-center">
                                <a href="/admin/setting/add-karyawan?id={{ $user->id }}" class="btn btn-sm btn-warning text-white">
                                    <i class="fas fa-pen"></i>
                                </a>

                            </td>
                            <td class="text-center">
                                @if($user->id != Auth::user()->id)
                                <a href="/admin/setting/karyawan/{{ $user->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                                @else
                                <button class="btn btn-sm btn-danger" disabled>
                                    <i class="fas fa-trash"></i>
                                </button>
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
@endsection