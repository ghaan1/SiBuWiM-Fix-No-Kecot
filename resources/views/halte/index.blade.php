@extends('layouts.dashboard.main')

@section('title', 'Data Halte')

@section('css')
<link rel="stylesheet" href="{{ asset('templates/dashboard/vendor') }}/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('templates/dashboard/vendor') }}/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Halte</li>
                    </ol>
                </nav>
            </div>
            @if (Session::has('success'))
            <div class="col">
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            </div>
            @endif
            @if (Session::has('error'))
            <div class="col">
                <div class="alert alert-danger">
                    {{Session::get('error')}}
                </div>
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Tambah Halte</h4>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{route('halte.store')}}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Rute</label>
                                <select class="form-control" id="produk_id" name="produk_id">
                                    <option selected hidden disabled>-- Pilih Rute --</option>
                                    @foreach ($produk as $item)
                                    <option value="{{$item->id}}">{{$item->nama}} - {{$item->nama_tujuan}}</option>
                                    @endforeach
                                </select>
                                @error('produk_id')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                                @error('nama')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Kota</label>
                                <input type="text" class="form-control" id="kota" name="kota">
                                @error('kota')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Provinsi</label>
                                <input type="text" class="form-control" id="provinsi" name="provinsi">
                                @error('provinsi')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Data Halte</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row p-4">
                            <div class="col-12">
                                <table id="table-halte" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Kota</th>
                                            <th>Provinsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modal')
<div class="modal fade" id="deleteHalteModal" tabindex="-1" role="dialog" aria-labelledby="deleteArmadaModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteHalteModalLabel">Konfirmasi Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah kamu yakin akan menghapus data ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary m-1" data-dismiss="modal">Close</button>
                <form id="form-delete-halte" class="m-1">
                    @csrf
                    <button type="submit" class="btn btn-danger m-1">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editHalteModal" tabindex="-1" role="dialog" aria-labelledby="editHalteModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editHalteModalLabel">Edit Halte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="loading">
                <div class="modal-body">
                    <p class="text-primary">
                        Loading...
                    </p>
                </div>
            </div>
            <div id="body-modal-edit">
                <form method="POST" id="form-edit-halte">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label>Rute</label>
                            <select class="form-control" id="produk_id_edit" name="produk_id_edit">
                                <option selected hidden disabled>-- Pilih Rute Jadwal --</option>
                                @foreach ($produk as $item)
                                <option value="{{$item->id}}">{{$item->nama}} - {{$item->nama_tujuan}}</option>
                                @endforeach
                            </select>
                            @error('produk')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Nama Halte</label>
                            <input type="text" class="form-control" id="nama_edit" name="nama_edit">
                            @error('nama')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Kota</label>
                            <input type="text" class="form-control" id="kota_edit" name="kota_edit">
                            @error('kota')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Provinsi</label>
                            <input type="text" class="form-control" id="provinsi_edit" name="provinsi_edit">
                            @error('provinsi')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
<script src="{{ asset('templates/dashboard/vendor') }}/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('templates/dashboard/vendor') }}/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('templates/dashboard/vendor') }}/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('templates/dashboard/vendor') }}/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('js/halte.js')}}"></script>
@endsection
