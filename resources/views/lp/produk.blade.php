@extends('layouts.lp.main')

@section('title', 'Daftar Produk')


@section('content')
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-hrading">Daftar Jadwal</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="{{route('beranda')}}">Beranda</a></li>
                        <li>Daftar Jadwal</li>
                    </ul>
                </div> <br> <br>
                @foreach($kategori as $item)
                <a href="{{ route('beranda.listprodukkategori', $item->id)}}" class="btn btn-primary">{{$item->nama}}</a>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->

<!-- Category Tab Area Start -->
<section class="category-tab-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2>Jadwal Terpopuler</h2>
                    <p>Tambahkan Jadwal terpopuler</p>
                </div>
                <!-- Section Title Start -->
            </div>
        </div>
        @if ($produk->isEmpty())
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger">
                    Jadwal tidak tersedia.
                </div>
            </div>
        </div>
        @else
        <div class="row">
            @if (isset($key))
            <div class="col-12 mb-5">
                <h5>Keyword Pencarian Produk : <strong>{{$key}}</strong></h5>
            </div>
            @endif
            @foreach ($produk as $item)
            <div class="col-md-3 col-6">
                <article class="list-product">
                    <div class="img-block">
                        <a href="{{route('beranda.detailproduk', $item->id)}}" class="thumbnail">
                            <img class="first-img w-100" src="/img/jadwal/{{$item->gambar}}" alt="" />
                        </a>
                    </div>
                    <div class="product-decs">
                        <a class="inner-link" href="shop-4-column.html"><span class="text-uppercase">{{$item->kategori->nama}}</span></a>
                        <h2><a href="{{route('beranda.detailproduk', $item->id)}}" class="product-link">{{$item->nama}} - {{$item->nama_tujuan}}</a></h2>
                        <div class="pricing-meta">
                            <ul>
                                <li class="current-price" style="font-size: 1.5em;">Rp {{number_format($item->harga, 0, ',', '.')}}</li>
                            </ul>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach
            <div class="col-12 mb-5">
                {{$produk->links('pagination::bootstrap-4')}}
            </div>
        </div>
        @endif

    </div>
</section>
<!-- Category Tab Area end -->

@endsection
