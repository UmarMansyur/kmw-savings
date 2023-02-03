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
                    <h5>Admin / Setting Kategori Tabungan</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Manajemen Kategori Tabungan</h4>
                <p class="text-muted mb-0">Jika anda ingin menambahkan karyawan baru, silahkan klik tombol tambah dibawah ini.</p>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-12">
                        <a href="" data-bs-toggle="modal" data-bs-target="#addCategory" class="btn btn-dark btn-sm float-end">Tambah</a>
                    </div>
                </div>
                <table id="datatable" class="table table-bordered dt-responsive mt-5">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 30%;">Nama</th>
                            <th style="width: 15%;">Limit</th>
                            <th style="width: 5%;">Edit</th>
                            <th style="width: 5%;">Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($saving_categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>Rp {{ number_format($category->limit, 0, ',', '.') }}</td>
                            <td class="text-center">
                                <a href="" class="btn btn-warning btn-sm text-white" id="editCategory{{ $category->id }}" data-bs-toggle="modal" data-bs-target="#editCategory" data-name="{{ $category->name }}" data-limit="{{ $category->limit }}"><i class="fas fa-pen"></i></a>
                                <script>
                                    document.getElementById('editCategory{{ $category->id }}').addEventListener('click', function() {
                                        const name = this.getAttribute('data-name');
                                        const limit = this.getAttribute('data-limit');
                                        document.getElementById('id_kategori').value = "{{ $category->id }}";
                                        console.log(document.getElementById('id_kategori').value);
                                        document.getElementById('name_edit').value = name;
                                        document.getElementById('limit_edit').value = limit;
                                    });
                                </script>
                            </td>
                            <td class="text-center">
                                <a href="/admin/setting/categories/{{ $category->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Tabungan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/setting/categories" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="limit" class="form-label">Limit:</label>
                                <input type="number" class="form-control" id="limit" name="limit" placeholder="Limit" min="1" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Kategori Tabungan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/setting/edit-categories" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <input type="hidden" name="id_kategori" id="id_kategori">
                                <label for="name_edit" class="form-label">Nama:</label>
                                <input type="text" class="form-control" id="name_edit" name="name_edit" placeholder="Nama" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="limit_edit" class="form-label">Limit:</label>
                                <input type="number" class="form-control" id="limit_edit" name="limit_edit" placeholder="Limit" min="1" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    @endsection