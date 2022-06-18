@extends('layouts.lp.main')

@section('title', 'Komplain')

@section('content')
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-hrading">Komplain</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="{{route('beranda')}}">Beranda</a></li>
                        <li>Komplain</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->

<div class="cart-main-area mb-5">
    <div class="container">
        <h3 class="cart-page-title">Ajukan Komplain</h3>
        <div class="row">
            <div class="col-12">
                <form action="{{route('komplain-user.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
                    <label>Judul</label>
                    <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul Komplain" />
                    @error('nama_penerima')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                    <br>
                    <label>Kategori Komplain</label><br>
                    <select class="form-control" name="jenis_komplain" id="">
                        <option disabled selected hidden>Pilih Kategori</option>
                        <option value="Armada">Armada</option>
                        <option value="Halte">Halte</option>
                    </select>
                    @error('nama_penerima')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                    <br>
                    <label>Deskripsi</label>
                    <textarea class="form-control" name="isi" placeholder="Masukkan Deskripsi Komplain" cols="30" rows="5"></textarea>
                    @error('nama_penerima')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                    <br>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- cart area end -->
@endsection
