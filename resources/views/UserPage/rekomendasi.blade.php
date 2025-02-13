@extends('UserPage.defaultFix')

@section('content')
    <div class="main-banner-velg" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="left-content show-up header-text"></div>
                        <div class="right-image"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="free-quote" class="free-quote">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="section-heading">
                        <h4>Chose Category</h4>
                        <div class="line-dec"></div>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-2">
                    <form id="search" action="#" method="GET">
                        <div class="row">
                            <div class="col-lg-4 col-sm-4">
                                <fieldset>
                                    <button type="button" class="main-button" data-bs-toggle="modal" data-bs-target="#productModalVelg">Velg</button>
                                </fieldset>
                            </div>
                            <div class="col-lg-4 col-sm-4">
                                <fieldset>
                                    <button type="button" class="main-button" data-bs-toggle="modal" data-bs-target="#productModalTire">Tire</button>
                                </fieldset>
                            </div>
                            <div class="col-lg-4 col-sm-4">
                                <fieldset>
                                    <button type="button" class="main-button" data-bs-toggle="modal" data-bs-target="#productModalSuspension">Suspension</button>
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

    <!-- Modal Rekomedasi Velg -->
    <div class="modal fade" id="productModalVelg" tabindex="-1" aria-labelledby="productModalVelgLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalVelgLabel">Rekomedasi Velg</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="productFormVelg">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Produk</label>
                            <select class="form-select" id="nama" name="nama" required>
                                <option value="">Pilih Produk</option>
                                <option value="Produk A">Produk A</option>
                                <option value="Produk B">Produk B</option>
                                <option value="Produk C">Produk C</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="merk" class="form-label">Merk</label>
                            <select class="form-select" id="merk" name="merk" required>
                                <option value="">Pilih Merk</option>
                                <option value="Merk X">Merk X</option>
                                <option value="Merk Y">Merk Y</option>
                                <option value="Merk Z">Merk Z</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="model" class="form-label">Model</label>
                            <select class="form-select" id="model" name="model" required>
                                <option value="">Pilih Model</option>
                                <option value="Model 1">Model 1</option>
                                <option value="Model 2">Model 2</option>
                                <option value="Model 3">Model 3</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <select class="form-select" id="harga" name="harga" required>
                                <option value="">Pilih Harga</option>
                                <option value="100000">100,000</option>
                                <option value="200000">200,000</option>
                                <option value="300000">300,000</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Rekomedasi Tire -->
    <div class="modal fade" id="productModalTire" tabindex="-1" aria-labelledby="productModalTireLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalTireLabel">Rekomedasi Ban</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="productFormTire">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Produk</label>
                            <select class="form-select" id="nama" name="nama" required>
                                <option value="">Pilih Produk</option>
                                <option value="Produk A">Produk A</option>
                                <option value="Produk B">Produk B</option>
                                <option value="Produk C">Produk C</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="merk" class="form-label">Merk</label>
                            <select class="form-select" id="merk" name="merk" required>
                                <option value="">Pilih Merk</option>
                                <option value="Merk X">Merk X</option>
                                <option value="Merk Y">Merk Y</option>
                                <option value="Merk Z">Merk Z</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="model" class="form-label">Model</label>
                            <select class="form-select" id="model" name="model" required>
                                <option value="">Pilih Model</option>
                                <option value="Model 1">Model 1</option>
                                <option value="Model 2">Model 2</option>
                                <option value="Model 3">Model 3</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <select class="form-select" id="harga" name="harga" required>
                                <option value="">Pilih Harga</option>
                                <option value="100000">100,000</option>
                                <option value="200000">200,000</option>
                                <option value="300000">300,000</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Rekomedasi Suspension -->
    <div class="modal fade" id="productModalSuspension" tabindex="-1" aria-labelledby="productModalSuspensionLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalSuspensionLabel">Rekomedasi Suspensi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="productFormSuspension">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Produk</label>
                            <select class="form-select" id="nama" name="nama" required>
                                <option value="">Pilih Produk</option>
                                <option value="Produk A">Produk A</option>
                                <option value="Produk B">Produk B</option>
                                <option value="Produk C">Produk C</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="merk" class="form-label">Merk</label>
                            <select class="form-select" id="merk" name="merk" required>
                                <option value="">Pilih Merk</option>
                                <option value="Merk X">Merk X</option>
                                <option value="Merk Y">Merk Y</option>
                                <option value="Merk Z">Merk Z</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="model" class="form-label">Model</label>
                            <select class="form-select" id="model" name="model" required>
                                <option value="">Pilih Model</option>
                                <option value="Model 1">Model 1</option>
                                <option value="Model 2">Model 2</option>
                                <option value="Model 3">Model 3</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <select class="form-select" id="harga" name="harga" required>
                                <option value="">Pilih Harga</option>
                                <option value="100000">100,000</option>
                                <option value="200000">200,000</option>
                                <option value="300000">300,000</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    

    <!-- Bootstrap JS -->
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Fungsi untuk menangani submit form
        function handleFormSubmit(event, modalId) {
            event.preventDefault();
            alert("Form berhasil disubmit!");
            event.target.reset();
            var modal = new bootstrap.Modal(document.getElementById(modalId));
            modal.hide();
        }

        // Menambahkan event listener ke setiap form modal
        document.getElementById("productFormVelg").addEventListener("submit", function (event) {
            handleFormSubmit(event, "productModalVelg");
        });

        document.getElementById("productFormTire").addEventListener("submit", function (event) {
            handleFormSubmit(event, "productModalTire");
        });

        document.getElementById("productFormSuspension").addEventListener("submit", function (event) {
            handleFormSubmit(event, "productModalSuspension");
        });
    });
    </script>
@endsection