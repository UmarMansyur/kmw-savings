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
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Suhu</span>
                        <h4 class="mb-3">
                            <span class="counter-value">30&#8451;</span>
                        </h4>
                    </div>
                    <div class="col-6 text-end">
                        <div class="avatar-lg float-end">
                            <i class="fas fa-users" style="font-size: xx-large;"></i>
                        </div>
                    </div>
                </div>
                <div class="text-nowrap">
                    <span class="badge bg-soft-success text-success">07:00 - 09:00</span>
                    <span class="ms-1 text-muted font-size-13">Today</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Suhu</span>
                        <h4 class="mb-3">
                            <span class="counter-value">30&#8451;</span>
                        </h4>
                    </div>
                    <div class="col-6 text-end">
                        <div class="avatar-lg float-end">
                            <i class="fas fa-users" style="font-size: xx-large;"></i>
                        </div>
                    </div>
                </div>
                <div class="text-nowrap">
                    <span class="badge bg-soft-success text-success">07:00 - 09:00</span>
                    <span class="ms-1 text-muted font-size-13">Today</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Suhu</span>
                        <h4 class="mb-3">
                            <span class="counter-value">30&#8451;</span>
                        </h4>
                    </div>
                    <div class="col-6 text-end">
                        <div class="avatar-lg float-end">
                            <i class="fas fa-users" style="font-size: xx-large;"></i>
                        </div>
                    </div>
                </div>
                <div class="text-nowrap">
                    <span class="badge bg-soft-success text-success">07:00 - 09:00</span>
                    <span class="ms-1 text-muted font-size-13">Today</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Line with Data Labels</h4>
            </div><!--end card-header-->
            <div class="card-body">
                <div class="chart-demo">
                    <div id="apex_line2" class="apex-charts"></div>
                </div>
            </div><!--end card-body-->
        </div>
    </div>
</div>
@endsection