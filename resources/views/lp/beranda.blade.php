@extends('layouts.lp.main')

@section('title', 'Beranda')

@section('content')
<!-- Slider Arae Start -->
<div class="slider-area">
    <div class="slider-active-3 owl-carousel slider-hm8 owl-dot-style">
        <!-- Slider Single Item Start -->
        <div class="slider-height-10 d-flex align-items-start justify-content-start bg-img" style="background-color: #ffffff;">
        <!-- background-image: url({{asset('templates/landing-page')}}/images/slider-image/sample-42.png); -->
            <div class="container">
                <div class="slider-content-5 slider-animated-1 text-left">
                    <span class="animated">Selamat Datang Di</span>
                    <h1 class="animated">
                        <strong>SiBuWim</strong><br />
                    </h1>
                    <p class="animated">Platform pemesanan tiket wisata terbaik</p>
                    <a href="{{route('beranda.listproduk')}}" class="shop-btn animated">Pesan Sekarang</a>
                </div>
            </div>
        </div>
        <!-- Slider Single Item End -->
    </div>
</div>
<!-- Slider Arae End -->
<!-- Category Tab Area Start -->
<section class="category-tab-area mt-60px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2>Jadwal Terpopuler</h2>
                    <p>Tambahkan Jadwal populer</p>
                </div>
                <!-- Section Title Start -->
            </div>
        </div>

        @if ($produk->isEmpty())
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger">
                    Data Jadwal masih kosong.
                </div>
            </div>
        </div>
        @else
        <div class="tab-content">
            <div id="accessories" class="tab-pane active">
                <div class="best-sell-slider owl-carousel owl-nav-style">
                    @foreach ($produk as $item)
                    <article class="list-product">
                        <div class="img-block">
                            <a href="{{route('beranda.detailproduk', $item->id)}}" class="thumbnail">
                                <img class="first-img" src="/img/jadwal/{{$item->gambar}}" alt="" />
                            </a>
                        </div>
                        <div class="product-decs">
                            <a class="inner-link" href=""><span class="text-uppercase">{{$item->kategori->nama}}</span></a>
                            <h2><a href="{{route('beranda.detailproduk', $item->id)}}" class="product-link">{{$item->nama}} - {{$item->nama_tujuan}} ({{$item->waktu_tempuh}} Jam)</a></h2>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="current-price">Rp {{number_format($item->harga, 0, ',', '.')}}</li>
                                </ul>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
<!-- Category Tab Area end -->

@endsection

@section('script')
<script>
    function addToCart(id) {
        $.ajax({
            type: "POST"
            , url: `${APP_URL}/detail-cart`
            , data: {
                id: id
            }
            , success: function(res) {
                window.location.href = `${APP_URL}/cart`;
            }
        });
    }

</script>
@endsection
