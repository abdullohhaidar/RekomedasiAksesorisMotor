@extends('UserPage.defaultFix')

@section('content')
    <div id="blog" class="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="section-heading">
                        <h6>Recent News</h6>
                        <h4>Details <em>Product Suspension</em></h4>
                        <div class="line-dec"></div>
                    </div>
                </div>

                <div class="col-lg-6 show-up wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="blog-post">
                        <div class="thumb">
                            <a href="#"><img src="{{ asset('storage/images/suspensi/' . $dataDSuspensi->gambar_suspensi) }}" alt="{{ $dataDSuspensi->nama_suspensi }}"></a>
                        </div>
                        <div class="down-content">
                            <span class="category">Rp. {{ number_format($dataDSuspensi->harga_suspensi, 0, ',', '.') }}</span>
                            <span class="date">{{ \Carbon\Carbon::parse($dataDSuspensi->created_at)->format('d F Y') }}</span>
                            <a href="#"><h4>{{ $dataDSuspensi->merk_suspensi }}</h4></a>
                            <p>{{ $dataDSuspensi->nama_suspensi }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="blog-posts">
                        <div class="row">
                            <div class="col-lg-12 mt-3">
                                <div class="post-item">
                                    <div class="thumb">
                                        <a href="#"><img src="{{ asset('images/icon/shockbreaker.png') }}" alt=""></a>
                                    </div>
                                    <div class="right-content">
                                        <a href="#"><h4>Size Shockbreaker</h4></a>
                                        <p>Size = {{ $dataDSuspensi->ukuran_suspensi }} </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 mt-3">
                                <div class="post-item">
                                    <div class="thumb">
                                        <a href="#"><img src="{{ asset('images/icon/motorcycle.png') }}" alt=""></a>
                                    </div>
                                    <div class="right-content">
                                        <a href="#"><h4>Motorcycle Type</h4></a>
                                        <p>{{ $dataDSuspensi->tipe_motor }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 mt-3">
                                <div class="post-item last-post-item">
                                    <div class="thumb">
                                        <a href="#"><img src="{{ asset('images/icon/art.png') }}" alt=""></a>
                                    </div>
                                    <div class="right-content">
                                        <a href="#"><h4>Color Shockbreaker</h4></a>
                                        <p>{{ $dataDSuspensi->warna_suspensi }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 mt-3">
                                <div class="post-item last-post-item">
                                    <div class="thumb">
                                        <a href="#"><img src="{{ asset('images/icon/brand.png') }}" alt=""></a>
                                    </div>
                                    <div class="right-content">
                                        <a href="#"><h4>Brand And Model</h4></a>
                                        <p>Brand = {{ $dataDSuspensi->merk_suspensi }}</p>
                                        <p>Model = {{ $dataDSuspensi->model_suspensi }}</p>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .row -->
                    </div> <!-- .blog-posts -->
                </div> <!-- .col-lg-6 -->
            </div>
        </div>
    </div>

@endsection