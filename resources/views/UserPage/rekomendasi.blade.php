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

        @if($dataRekomVelg->isEmpty() && $dataRekomBan->isEmpty() && $dataRekomSuspensi->isEmpty())
            {{-- Kalau data dari form kosong, tampilkan rekomendasi history like --}}
            <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="loop owl-carousel">

                            {{-- Rekomendasi Velg dari history --}}
                            @foreach($rekomendasiVelg as $velg)
                                <div class="item">
                                    <a href="{{ route('detailEVelg', ['id' => $velg->id_velg]) }}">
                                        <div class="portfolio-item">
                                            <div class="thumb">
                                                <img src="{{ asset('storage/images/velg/' . $velg->gambar_velg) }}" alt="{{ $velg->nama_velg }}">
                                            </div>
                                            <div class="down-content">
                                                <h4>{{ $velg->nama_velg }}</h4>
                                                <span>Rp. {{ number_format($velg->harga_velg, 0, ',', '.') }}</span>
                                                <p>score : {{ $velg->score }}</p>
                                            </div>
                                        </div>
                                    </a>  
                                </div>
                            @endforeach

                            {{-- Rekomendasi Ban dari history --}}
                            @foreach($rekomendasiBan as $ban)
                                <div class="item">
                                    <a href="{{ route('detailEBan', ['id' => $ban->id_ban]) }}">
                                        <div class="portfolio-item">
                                            <div class="thumb">
                                                <img src="{{ asset('storage/images/ban/' . $ban->gambar_ban) }}" alt="{{ $ban->nama_ban }}">
                                            </div>
                                            <div class="down-content">
                                                <h4>{{ $ban->nama_ban }}</h4>
                                                <span>Rp. {{ number_format($ban->harga_ban, 0, ',', '.') }}</span>
                                                <p>score : {{ $ban->score }}</p>
                                            </div>
                                        </div>
                                    </a>  
                                </div>
                            @endforeach

                            {{-- Rekomendasi Suspensi dari history --}}
                            @foreach($rekomendasiSuspensi as $suspensi)
                                <div class="item">
                                    <a href="{{ route('detailESuspensi', ['id' => $suspensi->id_suspensi]) }}">
                                        <div class="portfolio-item">
                                            <div class="thumb">
                                                <img src="{{ asset('storage/images/suspensi/' . $suspensi->gambar_suspensi) }}" alt="{{ $suspensi->nama_suspensi }}">
                                            </div>
                                            <div class="down-content">
                                                <h4>{{ $suspensi->nama_suspensi }}</h4>
                                                <span>Rp. {{ number_format($suspensi->harga_suspensi, 0, ',', '.') }}</span>
                                                <p>score : {{ $suspensi->score }}</p>
                                            </div>
                                        </div>
                                    </a>  
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        @else
            {{-- Kalau data dari form ada, tampilkan data rekomendasi dari form --}}
            <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="loop owl-carousel">

                            {{-- Rekomendasi Velg dari form --}}
                            @foreach($dataRekomVelg as $velg)
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

                            {{-- Rekomendasi Ban dari form --}}
                            @foreach($dataRekomBan as $ban)
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

                            {{-- Rekomendasi Suspensi dari form --}}
                            @foreach($dataRekomSuspensi as $suspensi)
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
        @endif


        
    </div>

    <!-- Modal Rekomendasi Velg -->
    <div class="modal fade" id="productModalVelg" tabindex="-1" aria-labelledby="productModalVelgLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable"> <!-- Tambahkan modal-xl agar lebih besar -->
            <div class="modal-content rounded-4 shadow-sm">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalVelgLabel">Rekomendasi Velg</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form id="contact" action="{{ route('rekomendasi.velg') }}" method="POST">
                        @csrf
                            <div class="row p-4">
                            <h3 class="tipe motor" >Pilih Motor</h3>
                                <div class="col-lg-2 mb-2" name="vario 150">
                                    <button type="button" class="btn btn-outline-success pilih-motor" data-nama="Honda Vario 150">Vario 150</button>
                                </div>
                                <div class="col-lg-2 mb-2" name="vario 160">
                                    <button type="button" class="btn btn-outline-success pilih-motor" data-nama="Honda Vario 160">Vario 160</button>
                                </div>
                                <div class="col-lg-2 mb-2" name="pcx">
                                    <button type="button" class="btn btn-outline-success pilih-motor" data-nama="Honda PCX 160">PCX 160</button>
                                </div>

                                <div class="col-lg-2 mb-2" name="aerox">
                                    <button type="button" class="btn btn-outline-success pilih-motor" data-nama="Yamaha AEROX 155">AEROX 155</button>
                                </div>

                                <div class="col-lg-2 mb-2" name="nmax">
                                    <button type="button" class="btn btn-outline-success pilih-motor" data-nama="Yamaha NMAX 155">NMAX 155</button>
                                </div>

                                <div class="col-lg-2 mb-2" name="lexi">
                                    <button type="button" class="btn btn-outline-success pilih-motor" data-nama="Yamaha Lexi 155">Lexi 155</button>
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <fieldset class="mt-1">
                                        <input type="text" name="ukuran_velg" id="ukuran_velg" class="form-control" placeholder="Ukuran Velg" required readonly>
                                    </fieldset>
                                    <fieldset class="mt-3">
                                    <select class="form-select py-2 px-3 border rounded" id="merk" name="merk">
                                        <option value="">Pilih Merk</option>
                                        @foreach($kategoriVelg->pluck('merk_velg')->unique() as $merk)
                                            <option value="{{ $merk }}">{{ $merk }}</option>
                                        @endforeach
                                    </select>
                                    </fieldset>
                                    <fieldset class="mt-3">
                                    <select class="form-select py-2 px-3 border rounded" id="merk" name="Material">
                                        <option value="">Pilih Material</option>
                                        @foreach($kategoriVelg->pluck('material_velg')->unique() as $material)
                                            <option value="{{ $material }}">{{ $material }}</option>
                                        @endforeach
                                    </select>
                                    </fieldset>
                                </div>
                                <div class="col-12 text-end">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="btn btn-success">Tampilkan Rekomendasi Velg</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Rekomedasi Tire -->
    <div class="modal fade" id="productModalTire" tabindex="-1" aria-labelledby="productModalTireLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable"> <!-- Tambahkan modal-xl agar lebih besar -->
            <div class="modal-content rounded-4 shadow-sm">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalTireLabel">Rekomendasi Ban</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form id="contact" action="{{ route('rekomendasi.ban') }}" method="POST">
                        @csrf
                            <div class="row p-4">
                            <h3 class="tipe motor" >Pilih Motor</h3>
                                <div class="col-lg-2 mb-2" name="vario 150">
                                    <button type="button" class="btn btn-outline-success pilih-motor-ban" data-nama="Honda Vario 150">Vario 150</button>
                                </div>
                                <div class="col-lg-2 mb-2" name="vario 160">
                                    <button type="button" class="btn btn-outline-success pilih-motor-ban" data-nama="Honda Vario 160">Vario 160</button>
                                </div>
                                <div class="col-lg-2 mb-2" name="pcx">
                                    <button type="button" class="btn btn-outline-success pilih-motor-ban" data-nama="Honda PCX 160">PCX 160</button>
                                </div>

                                <div class="col-lg-2 mb-2" name="aerox">
                                    <button type="button" class="btn btn-outline-success pilih-motor-ban" data-nama="Yamaha AEROX 155">AEROX 155</button>
                                </div>

                                <div class="col-lg-2 mb-2" name="nmax">
                                    <button type="button" class="btn btn-outline-success pilih-motor-ban" data-nama="Yamaha NMAX 155">NMAX 155</button>
                                </div>

                                <div class="col-lg-2 mb-2" name="lexi">
                                    <button type="button" class="btn btn-outline-success pilih-motor-ban" data-nama="Yamaha Lexi 155">Lexi 155</button>
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <fieldset class="mt-1">
                                        <input type="text" name="ukuran_ban" id="ukuran_ban" class="form-control" placeholder="Ukuran Ban" required readonly>
                                    </fieldset>
                                    <fieldset class="mt-3">
                                    <select class="form-select py-2 px-3 border rounded" id="merk" name="merk">
                                        <option value="">Pilih Merk</option>
                                        @foreach($kategoriBan->pluck('merk_ban')->unique() as $merk)
                                            <option value="{{ $merk }}">{{ $merk }}</option>
                                        @endforeach
                                    </select>
                                    </fieldset>
                                    <fieldset class="mt-3">
                                    <select class="form-select py-2 px-3 border rounded" id="merk" name="Material">
                                        <option value="">Pilih Material</option>
                                        @foreach($kategoriBan->pluck('tipe_ban')->unique() as $type)
                                            <option value="{{ $type }}">{{ $type }}</option>
                                        @endforeach
                                    </select>
                                    </fieldset>
                                </div>
                                <div class="col-12 text-end">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="btn btn-success">Tampilkan Rekomendasi Ban</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Rekomedasi Suspension -->
    <div class="modal fade" id="productModalSuspension" tabindex="-1" aria-labelledby="productModalSuspensionLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable"> <!-- Tambahkan modal-xl agar lebih besar -->
            <div class="modal-content rounded-4 shadow-sm">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalSuspensionLabel">Rekomendasi Suspensi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form id="contact" action="{{ route('rekomendasi.suspensi') }}" method="POST">
                        @csrf
                            <div class="row p-4">
                            <h3 class="tipe motor" >Pilih Motor</h3>
                                <div class="col-lg-2 mb-2" name="vario 150">
                                    <button type="button" class="btn btn-outline-success pilih-motor-suspensi" data-nama="Honda Vario 150" >Vario 150</button>
                                </div>
                                <div class="col-lg-2 mb-2" name="vario 160">
                                    <button type="button" class="btn btn-outline-success pilih-motor-suspensi" data-nama="Honda Vario 160" >Vario 160</button>
                                </div>
                                <div class="col-lg-2 mb-2" name="pcx">
                                    <button type="button" class="btn btn-outline-success pilih-motor-suspensi" data-nama="Honda PCX 160" >PCX 160</button>
                                </div>

                                <div class="col-lg-2 mb-2" name="aerox">
                                    <button type="button" class="btn btn-outline-success pilih-motor-suspensi" data-nama="Yamaha AEROX 155" >AEROX 155</button>
                                </div>

                                <div class="col-lg-2 mb-2" name="nmax">
                                    <button type="button" class="btn btn-outline-success pilih-motor-suspensi" data-nama="Yamaha NMAX 155" >NMAX 155</button>
                                </div>

                                <div class="col-lg-2 mb-2" name="lexi">
                                    <button type="button" class="btn btn-outline-success pilih-motor-suspensi" data-nama="Yamaha Lexi 155">Lexi 155</button>
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <fieldset class="mt-1">
                                        <input type="text" name="ukuran_suspensi" id="ukuran_suspensi" class="form-control" placeholder="Ukuran Suspensi" required readonly>
                                    </fieldset>
                                    <fieldset class="mt-3">
                                    <select class="form-select py-2 px-3 border rounded" id="merk" name="merk">
                                        <option value="">Pilih Merk</option>
                                        @foreach($kategoriSuspensi->pluck('merk_suspensi')->unique() as $merk)
                                            <option value="{{ $merk }}">{{ $merk }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 text-end">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="btn btn-success">Tampilkan Rekomendasi Suspensi</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
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
    <!-- Mengambil data Ukuran velg dari Nama Motor -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const motorButtons = document.querySelectorAll('.pilih-motor');
            const inputUkuranVelg = document.getElementById('ukuran_velg');

            motorButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const namaMotor = this.getAttribute('data-nama');
                    fetch(`/get-ukuran-velg/${encodeURIComponent(namaMotor)}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.ukuran_velg) {
                                inputUkuranVelg.value = data.ukuran_velg;
                            } else {
                                inputUkuranVelg.value = '';
                                alert('Data ukuran velg tidak ditemukan.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Terjadi kesalahan.');
                        });
                });
            });
        });
    </script>

    <!-- Mengambil data Ukuran Ban dari Nama Motor -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const motorBanButtons = document.querySelectorAll('.pilih-motor-ban');
            const inputUkuranBan = document.getElementById('ukuran_ban');

            motorBanButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const namaMotor = this.getAttribute('data-nama');
                    fetch(`/get-ukuran-ban/${encodeURIComponent(namaMotor)}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.ukuran_ban) {
                                inputUkuranBan.value = data.ukuran_ban;
                            } else {
                                inputUkuranBan.value = '';
                                alert('Data ukuran ban tidak ditemukan.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Terjadi kesalahan saat mengambil ukuran ban.');
                        });
                });
            });
        });
    </script>

    <!-- Mengambil data Ukuran Suspensi dari Nama Motor -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const motorButtons = document.querySelectorAll('.pilih-motor-suspensi');
            const inputUkuran = document.getElementById('ukuran_suspensi');

            motorButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const namaMotor = this.getAttribute('data-nama');
                    fetch(`/get-ukuran-suspensi/${encodeURIComponent(namaMotor)}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.ukuran_suspensi) {
                                inputUkuran.value = data.ukuran_suspensi;
                            } else {
                                inputUkuran.value = '';
                                alert('Data ukuran suspensi tidak ditemukan.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Terjadi kesalahan saat mengambil data.');
                        });
                });
            });
        });
    </script>
@endsection