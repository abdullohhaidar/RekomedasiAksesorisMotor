@extends('UserPage.defaultFix')

@section('content')
    <div id="blog" class="blog">
        <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
            <div class="section-heading">
                <h6>Recent News</h6>
                <h4>Details <em>Product suspension</em></h4>
                <div class="line-dec"></div>
            </div>
            </div>
            <div class="col-lg-6 show-up wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
            <div class="blog-post">
                <div class="thumb">
                <a href="#"><img src="{{ asset('images/velg/Vnd.jpg') }}" alt=""></a>
                </div>
                <div class="down-content">
                <span class="category">Rp. 2.000.000</span>
                <span class="date">12 Febuary 2025</span>
                <a href="#"><h4>KING SPEED</h4></a>
                <p>Velg Racing</p>
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
                        <p>Front = 185 x 14</p>
                        <p>Back = 215 x 14</p>
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
                        <p>Aluminium Alloy</p>
                    </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-3">
                    <div class="post-item last-post-item">
                    <div class="thumb">
                        <a href="#"><img src="{{ asset('images/icon/art.png') }}" alt=""></a>
                    </div>
                    <div class="right-content">
                        
                        <a href="#"><h4>Color Velg</h4></a>
                        <p>Black, Red, Blue Green</p>
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
                        <p>Brand = KTC Racing</p>
                        <p>Model = Chronos</p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>  
@endsection