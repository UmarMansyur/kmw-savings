@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col-6">
                    <h4 style="font-weight: 600">Dashboard</h4>
                </div>
                <div class="col-6 text-end">
                    <h5>Admin / Dashboard</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-4 col-md-6">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Karyawan</span>
                        <h4 class="mb-3">
                            <span class="counter-value">
                                {{ $employe }}
                            </span>
                        </h4>
                    </div>
                    <div class="col-6 text-end">
                        <div class="avatar-lg float-end">
                            <i class="fas fa-user-tie" style="font-size: xx-large;"></i>
                        </div>
                    </div>
                </div>
                <div class="text-nowrap">
                    <span class="badge bg-soft-success text-success">
                        {{ date('d-m-Y') }}
                    </span>
                    <span class="ms-1 text-muted font-size-13">Hari Ini</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Jamaah</span>
                        <h4 class="mb-3">
                            <span class="counter-value">
                                {{ $jamaah }}
                            </span>
                        </h4>
                    </div>
                    <div class="col-6 text-end">
                        <div class="avatar-lg float-end">
                            <i class="fas fa-users" style="font-size: xx-large;"></i>
                        </div>
                    </div>
                </div>
                <div class="text-nowrap">
                    <span class="badge bg-soft-success text-success">
                        {{ date('d-m-Y') }}
                    </span>
                    <span class="ms-1 text-muted font-size-13">Hari Ini</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Setoran Hari Ini</span>
                        <h4 class="mb-3">
                            <span class="counter-value">
                                Rp. {{ number_format($debit, 0, ',', '.') }}
                            </span>
                        </h4>
                    </div>
                    <div class="col-6 text-end">
                        <div class="avatar-lg float-end">
                            <i class="fas fa-cloud-upload-alt" style="font-size: xx-large;"></i>
                        </div>
                    </div>
                </div>
                <div class="text-nowrap">
                    <span class="badge bg-soft-success text-success">
                        {{ date('d-m-Y') }}
                    </span>
                    <span class="ms-1 text-muted font-size-13">Hari Ini</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection