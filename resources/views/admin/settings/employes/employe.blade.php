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
                    <h5>Admin / {{ request()->path() == 'admin/setting/add-karyawan' ? 'Tambah' : 'Edit' }} Karyawan
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>

@if (!request('id'))
<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Karyawan</h4>
                <div class="text-muted">Klik tombol simpan untuk menambahkan!</div>
            </div>
            <div class="card-body">
                <form action="/admin/setting/karyawan" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="name" class="form-label">Nama:</label>
                            <input type="text" name="name" id="name" class="form-control" autofocus
                                placeholder="Nama Karyawan" required>
                        </div>
                        <div class="col-6">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="phone" class="form-label">No. Telepon:</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="No. Telepon"
                                required>
                        </div>
                        <div class="col-6">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="gender" class="form-label">Jenis Kelamin: </label>
                            <select name="gender" id="gender" class="form-select" required>
                                <option value="male">Laki-Laki</option>
                                <option value="female">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password:</label>
                            <input type="password" autocomplete="false" name="password_confirmation"
                                id="password_confirmation" class="form-control" placeholder="Konfirmasi Password"
                                required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="address" class="form-label">Alamat:</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                        <div class="col-6">
                            <label for="role" class="form-label">Role:</label>
                            <select name="role" id="role" class="form-select" required>
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <label for="photo" class="form-label">Photo: </label>
                            <input type="file" id="input-file-now" name="photo" class="dropify" />

                        </div>
                    </div>
                    <button class="btn btn-primary btn-md  mt-2 float-end"><i class="fas fa-paper-plane"></i>
                        Simpan</button>
                    <button class="btn btn-light btn-md mt-2 float-start"><i class="fas fa-undo-alt"></i> Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>

@else

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ubah Karyawan</h4>
                <div class="text-muted">Klik tombol simpan untuk menyimpan!</div>
            </div>
            <div class="card-body">
                <form action="/admin/setting/edit-karyawan/{{request('id')}}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="name" class="form-label">Nama:</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nama Karyawan"
                                value="{{ $employe->name }}" required>
                        </div>
                        <div class="col-6">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                                value="{{ $employe->email }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="phone" class="form-label">No. Telepon:</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="No. Telepon"
                                value="{{ $employe->phone }}" required>
                        </div>
                        <div class="col-6">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Password">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="gender" class="form-label">Jenis Kelamin: </label>
                            <select name="gender" id="gender" class="form-select" value="{{ $employe->gender }}"
                                required>
                                <option value="male">Laki-Laki</option>
                                <option value="female">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password:</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control" placeholder="Konfirmasi Password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="address" class="form-label">Alamat:</label>
                            <input type="text" name="address" id="address" class="form-control"
                                value="{{ $employe->address }}">
                        </div>
                        <div class="col-6">
                            <label for="role" class="form-label">Role:</label>
                            <select name="role" id="role" class="form-select" required>
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{$role->id == $employe->role[0]->id }} >{{ $role->name
                                    }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <label for="photo" class="form-label">Photo: </label>
                            <input type="file" id="input-file-now" name="photo" class="dropify" />
                        </div>
                    </div>
                    <button class="btn btn-primary btn-md  mt-5 float-end"><i class="fas fa-paper-plane"></i>
                        Simpan</button>
                    <button class="btn btn-light btn-md mt-5 float-start"><i class="fas fa-undo-alt"></i> Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
@endsection