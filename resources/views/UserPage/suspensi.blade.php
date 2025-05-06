@extends('UserPage.defaultFix')

@section('content')
    <div class="main-banner-velg wow fadeIn " id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <div class="row">
                
                <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                </div>
                
                
                <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                </div>

            </div>
            </div>
        </div>
        </div>
    </div>
    <div id="portfolio" class="our-portfolio section">
        <div class="container">
        <div class="row">
            <div class="col-lg-8">
            <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                <h6>Our Product</h6>
                <h4>modification accessories <em>Suspension</em></h4>
                <div class="line-dec"></div>
            </div>
            </div>
        </div>
        </div>
        <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
        <div class="row">
            <div class="col-lg-12">
                <div class="loop owl-carousel">

                    @foreach($dataESuspensi as $suspensi)
                    <div class="item">
                        <a href="{{ route('detailESuspensi', ['id' => $suspensi->id_suspensi]) }}">
                            <div class="portfolio-item">
                                <div class="thumb">
                                    <img src="{{ asset('storage/images/suspensi/' . $suspensi->gambar_suspensi) }}" alt="{{ $suspensi->nama_suspensi }}">
                                </div>
                                <div class="down-content">
                                    <h4>{{ $suspensi->nama_suspensi }}</h4>
                                    <span>Rp. {{ number_format($suspensi->harga_suspensi, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </a>  
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection