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
                    <h5>Admin / Previews</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>BIODATA JAMAAH</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="media">
                        @isset($member->thumbnail)
                        <img src="{{ url('/storage/members/images/'.$member->thumbnail) }}" class="img-thumbnail mt-3" alt="user-image" width="300" height="300">
                        @else
                        <img src="{{ url('/images/default.jpg') }}" class="thumb-thumbnail mt-3" alt="user-image" width="300" height="300">
                        @endisset
                        <div class="media-body align-self-start ms-3 text-truncate">
                            <h3 class="my-0 fw-bold">{{ $member->name }} ({{ $member->gender == 'male' ? 'L' : 'P' }})  </h3>
                            <p class="text-muted mb-2 font-13">{{ $member->address }}</p>
                            @if($member->category == 'gold')
                            <button type="button" class="btn btn-sm btn-soft-warning">{{ ucfirst($member->category) }}</button>
                            @elseif($member->category == 'silver')
                            <button type="button" class="btn btn-sm btn-soft-secondary">{{ ucfirst($member->category) }}</button>
                            @elseif($member->category == 'blue')
                            <button type="button" class="btn btn-sm btn-soft-primary">{{ ucfirst($member->category) }}</button>
                            @else
                            <button type="button" class="btn btn-sm btn-soft-success">{{ ucfirst($member->category) }}</button>
                            @endif

                            <div class="row mt-2 mb-1">
                                <div class="col-3">
                                    <h5>
                                        Kode Anggota
                                    </h5>
                                </div>
                                <div class="col-9">
                                    <h5>
                                        : {{ $member->code }}
                                    </h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <h5>
                                        Nama Lengkap
                                    </h5>
                                </div>
                                <div class="col-9">
                                    <h5>
                                        : {{ $member->name }}
                                    </h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <h5>
                                        Jenis Kelamin
                                    </h5>
                                </div>
                                <div class="col-9">
                                    <h5>
                                        : {{ $member->gender == 'male' ? 'Laki-Laki' : 'Perempuan' }}
                                    </h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <h5>
                                        Alamat
                                    </h5>
                                </div>
                                <div class="col-9">
                                    <h5>
                                        : {{ $member->address }}
                                    </h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-3">
                                    <h5>
                                        No. HP
                                    </h5>
                                </div>
                                <div class="col-9">
                                    <h5>
                                        : {{ $member->phone }}
                                    </h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-3">
                                    <h5>
                                        Email
                                    </h5>
                                </div>
                                <div class="col-9">
                                    <h5>
                                        : {{ $member->email }}
                                    </h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-3">
                                    <h5>
                                        Password
                                    </h5>
                                </div>
                                <div class="col-9">
                                    <h5>
                                        : {{ $member->password }}
                                    </h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-3">
                                    <h5>
                                        Saldo
                                    </h5>
                                </div>
                                <div class="col-9">
                                    <h5>
                                        : Rp. @isset($member->saldo) {{ number_format($member->saldo, 0, ',', '.') }} @else 0 @endisset
                                    </h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-3">
                                    <h5>
                                        Tanggal Daftar
                                    </h5>
                                </div>
                                <div class="col-9">
                                    <h5>
                                        : {{ $member->created_at }}
                                    </h5>
                                </div>
                            </div>
                            
                        </div>
                        <a href="/admin/saving/" class="btn btn-success">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection