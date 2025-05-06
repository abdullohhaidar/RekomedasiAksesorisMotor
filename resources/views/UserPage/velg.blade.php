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
            <div class="col-lg-6">
            <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                <h6>Our Product</h6>
                <h4>modification accessories <em>Velg</em></h4>
                <div class="line-dec"></div>
            </div>
            </div>
        </div>
        </div>
        <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
        <div class="row">
            <div class="col-lg-12">
                <div class="loop owl-carousel">

                    @foreach($dataEVelg as $velg)
                    <div class="item">
                        <a href="{{ route('detailEVelg', ['id' => $velg->id_velg]) }}">
                            <div class="portfolio-item">
                                <div class="thumb">
                                    <img src="{{ asset('storage/images/velg/' . $velg->gambar_velg) }}" alt="{{ $velg->nama_velg }}">
                                </div>
                                <div class="down-content">
                                    <h4>{{ $velg->nama_velg }}</h4>
                                    <span>Rp. {{ number_format($velg->harga_velg, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </a>  
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
</div>
    </div>
@endsection