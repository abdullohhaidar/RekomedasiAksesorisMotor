@extends('UserPage.defaultFix')

@section(section: 'content')
    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                    <div class="row">
                    <div class="col-lg-12">
                        <h6>King Motor Variation</h6>
                        <h2>Bengkel & Toko Aksesoris Motor Terlengkap</h2>
                        <p>King Motor Variation adalah solusi terbaik bagi para pecinta otomotif yang ingin memodifikasi motor kesayangan. Kami menyediakan berbagai jenis aksesoris motor berkualitas tinggi serta layanan bengkel terpercaya untuk meningkatkan tampilan dan performa motor Anda.</p>
                    </div>
                    
                    </div>
                </div>
                </div>
                <div class="col-lg-6">
                <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                    <img src="{{ asset('images/slider.png') }}" alt="">
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

    <div id="about" class="about section">
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6">
                <div class="about-left-image  wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                    <img src="{{ asset('images/slider2.png') }}" alt="">
                </div>
                </div>
                <div class="col-lg-6 align-self-center  wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="about-right-content">
                    <div class="section-heading">
                    <h6>Tentang Kami</h6>
                    <h4>King Motor Variation</em></em></h4>
                    <div class="line-dec"></div>
                    </div>
                    <p>King Motor Variation adalah bengkel dan toko aksesoris motor yang hadir untuk memenuhi kebutuhan modifikasi dan perawatan motor Anda. Dengan produk-produk unggulan dan teknisi berpengalaman, kami siap membantu Anda menciptakan motor impian yang stylish dan bertenaga.</p>
                    <div class="row">
                    <div class="col-lg-4 col-sm-4">
                        <div class="skill-item first-skill-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                        <div class="progress" data-percentage="90">
                            <span class="progress-left">
                            <span class="progress-bar"></span>
                            </span>
                            <span class="progress-right">
                            <span class="progress-bar"></span>
                            </span>
                            <div class="progress-value">
                            <div>
                                90%<br>
                                <span>Produk Original</span>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <div class="skill-item second-skill-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                        <div class="progress" data-percentage="80">
                            <span class="progress-left">
                            <span class="progress-bar"></span>
                            </span>
                            <span class="progress-right">
                            <span class="progress-bar"></span>
                            </span>
                            <div class="progress-value">
                            <div>
                                80%<br>
                                <span>Kepuasan Pelanggan</span>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <div class="skill-item third-skill-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                        <div class="progress" data-percentage="80">
                            <span class="progress-left">
                            <span class="progress-bar"></span>
                            </span>
                            <span class="progress-right">
                            <span class="progress-bar"></span>
                            </span>
                            <div class="progress-value">
                            <div>
                                80%<br>
                                <span>Layanan  Profesional</span>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div> 
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

    <div id="services" class="services section">
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                <h6>Layanan Kami</h6>
                <h4>Apa Saja yang Kami <em>Tawarkan</em></h4>
                <div class="line-dec"></div>
            </div>
            </div>
            <div class="col-lg-12">
            <div class="naccs">
                <div class="grid">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="menu">
                        <div class="first-thumb active">
                        <div class="thumb">
                            <span class="icon"><img src="{{ asset('images/installation.png') }}" alt=""></span>
                            Pemasangan
                        </div>
                        </div>
                        <div>
                        <div class="thumb">                 
                            <span class="icon"><img src="{{ asset('images/trolley.png') }}" alt=""></span>
                            Penjualan
                        </div>
                        </div>
                        <div>
                        <div class="thumb">                 
                            <span class="icon"><img src="{{ asset('images/services.png') }}" alt=""></span>
                            Service
                        </div>
                        </div>
                        <div>
                        <div class="thumb">                 
                            <span class="icon"><img src="{{ asset('images/customization.png') }}" alt=""></span>
                            Custom
                        </div>
                        
                    </div>
                    </div> 
                    <div class="col-lg-12">
                    <ul class="nacc">
                        <li class="active">
                        <div>
                            <div class="thumb">
                            <div class="row">
                                <div class="col-lg-6 align-self-center">
                                <div class="left-text">
                                    <h4>Pemasangan Aksesoris Motor</h4>
                                    <p>Kami menyediakan layanan pemasangan berbagai aksesoris motor seperti spion custom, knalpot racing, lampu LED, box motor, dan lainnya. Semua dipasang oleh teknisi berpengalaman dengan hasil rapi dan aman.</p>
                                </div>
                                </div>
                                <div class="col-lg-6 align-self-center">
                                <div class="right-image">
                                    <img src="{{ asset('images/sliderpemasangan.png') }}" alt="">
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </li>
                        <li>
                        <div>
                            <div class="thumb">
                            <div class="row">
                                <div class="col-lg-6 align-self-center">
                                <div class="left-text">
                                    <h4>Penjualan Aksesoris Berkualitas</h4>
                                    <p>Berbagai pilihan aksesoris motor dari merk ternama tersedia di toko kami, mulai dari velg, ban, handle rem, jok, hingga bodi variasi untuk berbagai tipe motor matic dan sport.</p>
                                </div>
                                </div>
                                <div class="col-lg-6 align-self-center">
                                <div class="right-image">
                                    <img src="{{ asset('images/sliderpenjualan.png') }}" alt="">
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </li>
                        <li>
                        <div>
                            <div class="thumb">
                            <div class="row">
                                <div class="col-lg-6 align-self-center">
                                <div class="left-text">
                                    <h4>Servis Rutin & Tune Up</h4>
                                    <p>Selain variasi, kami juga menyediakan layanan servis rutin seperti ganti oli, pengecekan rem, servis karburator dan injeksi, tune-up mesin, serta pengecekan kelistrikan.</p>
                                </div>
                                </div>
                                <div class="col-lg-6 align-self-center">
                                <div class="right-image">
                                    <img src="{{ asset('images/sliderservice.png') }}" alt="">
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </li>
                        <li>
                        <div>
                            <div class="thumb">
                            <div class="row">
                                <div class="col-lg-6 align-self-center">
                                <div class="left-text">
                                    <h4>Custom & Pre-Order Aksesoris</h4>
                                    <p>Ingin tampilan motor yang unik? Kami menerima permintaan custom aksesoris motor sesuai keinginan Anda, termasuk pengecatan, stiker, hingga desain 3D bodi motor.</p>
                                </div>
                                </div>
                                <div class="col-lg-6 align-self-center">
                                <div class="right-image">
                                    <img src="{{ asset('images/slidercustom.png') }}" alt="">
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </li>
                        <li>
                        
                        </li>
                    </ul>
                    </div>          
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

    <div id="portfolio" class="our-portfolio-history section">
    </div>
@endsection