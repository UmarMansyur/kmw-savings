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
                    <h5>Admin / {{ request()->path() == 'admin/setting/add-jamaah' ? 'Tambah' : 'Edit'  }} Jamaah</h5>
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
                <h4 class="card-title">Tambah Jamaah</h4>
                <div class="text-muted">Klik tombol simpan untuk menambahkan!</div>
            </div>
            <div class="card-body">
                <form action="/admin/setting/jamaah" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="name" class="form-label">Nama:</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nama Jamaah" required>
                        </div>
                        <div class="col-6">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="phone" class="form-label">No. Telepon:</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="No. Telepon" required>
                        </div>
                        <div class="col-6">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
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
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="address" class="form-label">Alamat:</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                        <div class="col-6">
                            <label for="saving_categories" class="form-label">Jenis Tabungan:</label>
                            <select name="saving_categories" id="saving_categories" class="form-select" required>
                                @foreach ($saving_categories as $saving_category)
                                <option value="{{ $saving_category->id }}">{{ ucfirst($saving_category->name) }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <label for="File" class="form-label">File: </label>
                            <input type="file" name="File" class="form-control"/>
                            <p class="text-muted">
                                File yang diupload harus berupa .zip
                            </p>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <label for="photo" class="form-label">Photo: </label>
                            <input type="file" id="input-file-now" name="photo" class="dropify" />

                        </div>
                    </div>
                    <button class="btn btn-primary btn-md  mt-2 float-end"><i class="fas fa-paper-plane"></i> Simpan</button>
                    <button class="btn btn-light btn-md mt-2 float-start"><i class="fas fa-undo-alt"></i> Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>

@else

<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ubah Jamaah</h4>
                <div class="text-muted">Klik tombol simpan untuk menyimpan!</div>
            </div>
            <div class="card-body">
                <form action="/admin/setting/edit-jamaah/{{$member->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="name" class="form-label">Nama:</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nama Jamaah" required value="{{ $member->name }}">
                        </div>
                        <div class="col-6">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required value="{{ $member->email }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="phone" class="form-label">No. Telepon:</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="No. Telepon" required value="{{ $member->phone }}">
                        </div>
                        <div class="col-6">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="gender" class="form-label">Jenis Kelamin: </label>
                            <select name="gender" id="gender" class="form-select" required value="{{ $member->gender }}">
                                <option value="male">Laki-Laki</option>
                                <option value="female">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password:</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Konfirmasi Password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="address" class="form-label">Alamat:</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ $member->address }}">
                        </div>
                        <div class="col-6">
                            <label for="saving_categories" class="form-label">Jenis Tabungan: </label>
                            <select name="saving_categories" id="saving_categories" class="form-select" required>
                                @foreach ($saving_categories as $saving_category)
                                <option value="{{ $saving_category->id }}" {{ $saving_category->id == $member->saving_category[0]->id ? 'selected': '' }}>{{ ucfirst($saving_category->name) }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <label for="File" class="form-label">File: </label>
                            <input type="file" name="File" class="form-control"/>
                            <p class="text-muted">
                                File yang diupload harus berupa .zip
                            </p>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <label for="photo" class="form-label">Photo: </label>
                            <input type="file" id="input-file-now" name="photo" class="dropify" />
                        </div>
                    </div>
                    <button class="btn btn-primary btn-md  mt-2 float-end"><i class="fas fa-paper-plane"></i> Simpan</button>
                    <button class="btn btn-light btn-md mt-2 float-start"><i class="fas fa-undo-alt"></i> Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

@endsection