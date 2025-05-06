@extends('UserPage.defaultFix')

@section('content')
<div id="blog" class="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="section-heading">
                    <h6>Recent News</h6>
                    <h4>Details <em>Product</em></h4>
                    <div class="line-dec"></div>
                </div>
            </div>

            <div class="col-lg-6 show-up wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="blog-post">
                    <div class="thumb">
                        <a href="#"><img src="{{ asset('storage/images/velg/' . $dataDVelg->gambar_velg) }}" alt="{{ $dataDVelg->nama_velg }}"></a>
                    </div>
                    <div class="down-content">
                        <span class="category">Rp. {{ number_format($dataDVelg->harga_velg, 0, ',', '.') }}</span>
                        <span class="date">{{ \Carbon\Carbon::parse($dataDVelg->created_at)->format('d F Y') }}</span>
                        <a href="#"><h4>{{ $dataDVelg->nama_velg }}</h4></a>
                        <p>{{ $dataDVelg->merk_velg }}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="blog-posts">
                    <div class="row">
                        <div class="col-lg-12 mt-3">
                            <div class="post-item">
                                <div class="thumb">
                                    <a href="#"><img src="{{ asset('images/icon/wheel.png') }}" alt=""></a>
                                </div>
                                <div class="right-content">
                                    <a href="#"><h4>Size Tire</h4></a>
                                    <p>Front = {{ $dataDVelg->ukuran_velg }}</p>
                                    <p>Back = {{ $dataDVelg->ukuran_velg }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-3">
                            <div class="post-item">
                                <div class="thumb">
                                    <a href="#"><img src="{{ asset('images/icon/steel-bar.png') }}" alt=""></a>
                                </div>
                                <div class="right-content">
                                    <a href="#"><h4>Material</h4></a>
                                    <p>{{ $dataDVelg->material_velg }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-3">
                            <div class="post-item">
                                <div class="thumb">
                                    <a href="#"><img src="{{ asset('images/icon/art.png') }}" alt=""></a>
                                </div>
                                <div class="right-content">
                                    <a href="#"><h4>Color Velg</h4></a>
                                    <p>{{ $dataDVelg->warna_velg }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-3">
                            <div class="post-item">
                                <div class="thumb">
                                    <a href="#"><img src="{{ asset('images/icon/brand.png') }}" alt=""></a>
                                </div>
                                <div class="right-content">
                                    <a href="#"><h4>Brand And Model</h4></a>
                                    <p>Brand = {{ $dataDVelg->brand_velg }}</p>
                                    <p>Model = {{ $dataDVelg->model_velg }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- col-lg-6 -->
        </div> <!-- row -->
    </div> <!-- container -->
</div> <!-- blog -->

@endsection