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

    <div id="free-quote" class="free-quote">
        <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4">
            <div class="section-heading  wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                <h4>Chose Category</h4>
                <div class="line-dec"></div>
            </div>
            </div>
            <div class="col-lg-8 offset-lg-2  wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
            <form id="search" action="#" method="GET">
                <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <fieldset>
                    <button type="submit" class="main-button">Velg</button>
                    </fieldset>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <fieldset>
                    <button type="submit" class="main-button">Tire</button>
                    </fieldset>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <fieldset>
                    <button type="submit" class="main-button">Suspension</button>
                    </fieldset>
                </div>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    <div id="portfolio" class="our-portfolio section">
        <div class="container">
        <div class="row">
            <div class="col-lg-6">
            <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                <h6>Our Recomendation</h6>
                <h4>modification accessories</h4>
                <div class="line-dec"></div>
            </div>
            </div>
        </div>
        </div>
        <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
        <div class="row">
            <div class="col-lg-12">
            <div class="loop owl-carousel">
                <div class="item">
                <a href="{{ route('detail') }}">
                    <div class="portfolio-item">
                    <div class="thumb">
                    <img src="{{ asset('images/portfolio-01.jpg') }}" alt="">
                    </div>
                    <div class="down-content">
                    <h4>Velg RCB</h4>
                    <span>Rp. 200.000</span>
                    </div>
                </div>
                </a>  
                </div>
                <div class="item">
                <a href="#">
                    <div class="portfolio-item">
                    <div class="thumb">
                    <img src="{{ asset('images/portfolio-01.jpg') }}" alt="">
                    </div>
                    <div class="down-content">
                    <h4>Website Builder</h4>
                    <span>Marketing</span>
                    </div>
                </div>
                </a>  
                </div>
                <div class="item">
                <a href="#">
                    <div class="portfolio-item">
                    <div class="thumb">
                    <img src="{{ asset('images/portfolio-02.jpg') }}" alt="">
                    </div>
                    <div class="down-content">
                    <h4>Website Builder</h4>
                    <span>Marketing</span>
                    </div>
                </div>
                </a>  
                </div>
                <div class="item">
                <a href="#">
                    <div class="portfolio-item">
                    <div class="thumb">
                    <img src="{{ asset('images/portfolio-03.jpg') }}" alt="">
                    </div>
                    <div class="down-content">
                    <h4>Website Builder</h4>
                    <span>Marketing</span>
                    </div>
                </div>
                </a>  
                </div>
                <div class="item">
                <a href="#">
                    <div class="portfolio-item">
                    <div class="thumb">
                    <img src="{{ asset('images/portfolio-04.jpg') }}" alt="">
                    </div>
                    <div class="down-content">
                    <h4>Website Builder</h4>
                    <span>Marketing</span>
                    </div>
                </div>
                </a>  
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection