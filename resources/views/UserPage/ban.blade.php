@extends('UserPage.defaultFix')

@section('content')
    <div class="main-banner-ban wow fadeIn " id="top" data-wow-duration="1s" data-wow-delay="0.5s">
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
            <div class="col-lg-7">
            <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                <h6>Our Product</h6>
                <h4>modification accessories <em>Tire</em></h4>
                <div class="line-dec"></div>
            </div>
            </div>
        </div>
        </div>
        <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
        <div class="row">
            <div class="col-lg-12">
                <div class="loop owl-carousel">

                    @foreach($dataEBan as $ban)
                    <div class="item">
                        <a href="{{ route('detailEBan', ['id' => $ban->id_ban]) }}">
                            <div class="portfolio-item">
                                <div class="thumb">
                                    <img src="{{ asset('storage/images/ban/' . $ban->gambar_ban) }}" alt="{{ $ban->nama_ban }}">
                                </div>
                                <div class="down-content">
                                    <h4>{{ $ban->nama_ban }}</h4>
                                    <span>Rp. {{ number_format($ban->harga_ban, 0, ',', '.') }}</span>
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