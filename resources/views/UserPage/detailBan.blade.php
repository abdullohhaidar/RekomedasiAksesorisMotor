@extends('UserPage.defaultFix')

@section('content')
    <div id="blog" class="blog">
        <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
            <div class="section-heading">
                <h6>Recent News</h6>
                <h4>Details <em>Product Tire</em></h4>
                <div class="line-dec"></div>
            </div>
            </div>
            <div class="col-lg-6 show-up wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
            <div class="blog-post">
                <div class="thumb">
                <a href="#"><img src="{{ asset('images/tire/tireVario.jpg.webp') }}" alt=""></a>
                </div>
                <div class="down-content">
                <span class="category">Rp. 1.755.000</span>
                <span class="date">12 Febuary 2025</span>
                <a href="#"><h4>MICHELIN</h4></a>
                <p>Tire Vario 160</p>
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
                        <p>Front = 100/80-14 </p>
                        <p>Back = 120/70-14 </p>
                    </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-3">
                    <div class="post-item">
                    <div class="thumb">
                        <a href="#"><img src="{{ asset('images/icon/tire.png') }}" alt=""></a>
                    </div>
                    <div class="right-content">
                        
                        <a href="#"><h4>Type Tire</h4></a>
                        <p>Tubeless</p>
                    </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-3">
                    <div class="post-item last-post-item">
                    <div class="thumb">
                        <a href="#"><img src="{{ asset('images/icon/motorcycle.png') }}" alt=""></a>
                    </div>
                    <div class="right-content">
                        
                        <a href="#"><h4>Motorcycle Type</h4></a>
                        <p> Vario Matic 160 cc</p>
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
                        <p>Brand = Michelin</p>
                        <p>Model = Pilot Street</p>
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