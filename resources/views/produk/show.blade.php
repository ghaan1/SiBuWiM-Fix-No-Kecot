@extends('layouts.dashboard.main')

@section('title', 'Detail Produk')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Jadwal</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Detail Jadwal</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row p-4">
                            <div class="col-12">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="/img/jadwal/{{ $data->gambar }}" class="img-thumbnail w-100" alt="">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-4">Kategori Jadwal</div>
                                            <div class="col-md-8 font-weight-bold">{{$data->kategori->nama}}</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-4">Kategori Jadwal</div>
                                            <div class="col-md-8 font-weight-bold">{{$data->kategori->nama}}</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-4">Nama Jadwal</div>
                                            <div class="col-md-8 font-weight-bold">{{$data->nama}}</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-4">Harga Jadwal</div>
                                            <div class="col-md-8 font-weight-bold">Rp {{ number_format($data->harga, 0, ',', '.')}}</div>

                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-4">Stok Jadwal</div>
                                            <div class="col-md-8 font-weight-bold">{{$data->stok}}</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-4">Deskripsi Jadwal</div>
                                            <div class="col-md-8 font-weight-bold">{{$data->deskripsi}}</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
