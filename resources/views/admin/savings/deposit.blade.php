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
                <h4>PENYETORAN</h4>
                <div class="text-muted">
                    Untuk melakukan setor, silahkan isi form dibawah ini.
                </div>
            </div>
            <div class="card-body">
                <div class="row mt-2">
                    <div class="media">
                        @isset($member->photo)
                        <img src="{{ url('/storage/members/images/'.$member->thumbnail) }}" class="img-thumbnail mt-3" alt="user-image" width="300" height="300">
                        @else
                        <img src="{{ url('/images/default.jpg') }}" class="img-thumbnail mt-3" alt="user-image" width="300" height="300">
                        @endisset
                        <div class="media-body align-self-start ms-3 text-truncate">
                            <h3 class="my-0 fw-bold">{{ $member->name }} ({{ $member->gender == 'male' ? 'L' : 'P' }}) </h3>
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
                            <form action="/admin/saving/deposit/{{$member->id}}" method="post">
                                @csrf
                                <div class="row mt-5">
                                    <div class="col-3">
                                        <label for="saldo">
                                            <h5>Saldo:</h5>
                                        </label>
                                    </div>
                                    <div class="col-6">
                                        @isset($member->saldo)
                                        <input type="text" class="form-control" name="saldo" id="saldo" value="Rp. {{ number_format($member->saldo, 0, ',', '.') }}" readonly>
                                        @else
                                        <input type="text" class="form-control" name="saldo" id="saldo" value="Rp. 0" readonly>
                                        @endisset
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-3">
                                        <label for="deposit">
                                            <h5>Deposit</h5>
                                        </label>
                                    </div>
                                    <div class="col-6">
                                        <input type="number" class="form-control" name="debit" id="debit">
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-6 offset-3 text-end">
                                        <button class="btn btn-light float-start">
                                            <i class="fas fa-undo"></i> Reset
                                        </button>
                                        <button type="submit" class="btn btn-info">
                                            <i class="fas fa-paper-plane"></i> Simpan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <a href="/admin/saving/" class="btn btn-success">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection