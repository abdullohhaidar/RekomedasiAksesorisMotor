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
                <a href="#"><img src="{{ asset('images/suspension/shockrcb.jpg') }}" alt=""></a>
                </div>
                <div class="down-content">
                <span class="category">2.850.000</span>
                <span class="date">12 Febuary 2025</span>
                <a href="#"><h4>Racing Boy</h4></a>
                <p>Shockbreaker Vario 160</p>
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
                        <p>Size = 330MM </p>
                        
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
                        <p> Vario Matic 160 cc</p>
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
                        <p>Titanium, Red, Black Series</p>
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
                        <p>Brand = Racing Boy</p>
                        <p>Model = NVX</p>
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