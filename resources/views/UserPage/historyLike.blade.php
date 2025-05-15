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

    <div id="services" class="services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                        <h6>History Like</h6>
                        <h4>Semua Produk yang <em>Kamu Suka</em></h4>
                        <div class="line-dec"></div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="naccs">
                        <div class="grid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="nacc active">
                                        <li class="active">
                                            <div>
                                                <div class="thumb">
                                                    <div class="row">

                                                        <!-- Ban -->
                                                    @if($historyBan->isEmpty())
                                                        <div class="col-12 text-center mb-4">
                                                            <p class="text-muted">Belum ada produk ban yang Anda sukai.</p>
                                                        </div>
                                                    @else
                                                        @foreach($historyBan as $item)
                                                            <div class="col-lg-4 mb-4">
                                                                <div class="card" style="width: 100%;">
                                                                    <img src="{{ asset('storage/images/ban/' . $item->gambar_ban) }}" class="card-img-top" alt="{{ $item->merk_ban }}">
                                                                    <div class="card-body d-flex justify-content-between align-items-center">
                                                                        <div>
                                                                            <h5 class="card-title mb-1">{{ $item->merk_ban }}</h5>
                                                                            <p class="card-text mb-0">Harga : {{ $item->harga_ban }}</p>
                                                                        </div>
                                                                        <form action="{{ route('historyLikeBan.delete', $item->id_history_like_ban) }}" method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                                                                <i class="bi bi-trash"></i>
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif


                                                    <!-- Velg -->
                                                    @if($historyVelg->isEmpty())
                                                        <div class="col-12 text-center mb-4">
                                                            <p class="text-muted">Belum ada produk velg yang Anda sukai.</p>
                                                        </div>
                                                    @else
                                                        @foreach($historyVelg as $item)
                                                            <div class="col-lg-4 mb-4">
                                                                <div class="card" style="width: 100%;">
                                                                    <img src="{{ asset('storage/images/velg/' . $item->gambar_velg) }}" class="card-img-top" alt="{{ $item->merk_velg }}">
                                                                    <div class="card-body d-flex justify-content-between align-items-center">
                                                                        <div>
                                                                            <h5 class="card-title mb-1">{{ $item->merk_velg }}</h5>
                                                                            <p class="card-text mb-0">Harga : {{ $item->harga_velg }}</p>
                                                                        </div>
                                                                        <form action="{{ route('historyLikeVelg.delete', $item->id_history_like_velg) }}" method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                                                                <i class="bi bi-trash"></i>
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif

                                                    <!-- Suspensi -->
                                                    @if($historySuspensi->isEmpty())
                                                        <div class="col-12 text-center mb-4">
                                                            <p class="text-muted">Belum ada produk suspensi yang Anda sukai.</p>
                                                        </div>
                                                    @else
                                                        @foreach($historySuspensi as $item)
                                                            <div class="col-lg-4 mb-4">
                                                                <div class="card" style="width: 100%;">
                                                                    <img src="{{ asset('storage/images/suspensi/' . $item->gambar_suspensi) }}" class="card-img-top" alt="{{ $item->merk_suspensi }}">
                                                                    <div class="card-body d-flex justify-content-between align-items-center">
                                                                        <div>
                                                                            <h5 class="card-title mb-1">{{ $item->merk_suspensi }}</h5>
                                                                            <p class="card-text mb-0">Harga : {{ $item->harga_suspensi }}</p>
                                                                        </div>
                                                                        <form action="{{ route('historyLikeSuspensi.delete', $item->id_history_like_suspensi) }}" method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                                                                <i class="bi bi-trash"></i>
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
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
