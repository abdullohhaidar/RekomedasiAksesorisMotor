@extends('UserPage.defaultFix')

@section('content')
<style>
  .animate-heart {
    animation: pop 0.3s ease;
  }

  @keyframes pop {
    0%   { transform: scale(1); }
    50%  { transform: scale(1.4); }
    100% { transform: scale(1); }
  }
</style>
<div id="blog" class="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="section-heading">
                    <h6>Recent News</h6>
                    <h4>Details <em>Product</em></h4>
                    <div class="line-dec"></div>
                </div>
            </div>

            <div class="col-lg-6 show-up wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="blog-post">
                    <div class="thumb">
                        <a href="#"><img src="{{ asset('storage/images/velg/' . $dataDVelg->gambar_velg) }}" alt="{{ $dataDVelg->nama_velg }}"></a>
                    </div>
                    <div class="down-content">
                        <span class="category">Rp. {{ number_format($dataDVelg->harga_velg, 0, ',', '.') }}</span>
                        <span class="date" style="margin-top: 50px;">
                            <button id="likeButton" onclick="toggleLikeVelg(this)" 
                                data-merk="{{ $dataDVelg->merk_velg }}"
                                data-harga="{{ $dataDVelg->harga_velg }}"
                                data-ukuran="{{ $dataDVelg->ukuran_velg }}"
                                data-material="{{ $dataDVelg->material_velg }}"
                                data-warna="{{ $dataDVelg->warna_velg }}"
                                class="btn p-4 rounded-circle" style="background-color: white; border: none; box-shadow: none;">
                                <i id="heartIcon" class="bi {{ $liked ? 'bi-heart-fill text-danger' : 'bi-heart text-secondary' }}" style="font-size: 2.5rem;"></i>
                            </button>
                        </span>
                        <a href="#"><h4>{{ $dataDVelg->nama_velg }}</h4></a>
                        <p>{{ $dataDVelg->merk_velg }}</p>
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
                                    <p>Front = {{ $dataDVelg->ukuran_velg }}</p>
                                    <p>Back = {{ $dataDVelg->ukuran_velg }}</p>
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
                                    <p>{{ $dataDVelg->material_velg }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-3">
                            <div class="post-item">
                                <div class="thumb">
                                    <a href="#"><img src="{{ asset('images/icon/art.png') }}" alt=""></a>
                                </div>
                                <div class="right-content">
                                    <a href="#"><h4>Color Velg</h4></a>
                                    <p>{{ $dataDVelg->warna_velg }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-3">
                            <div class="post-item">
                                <div class="thumb">
                                    <a href="#"><img src="{{ asset('images/icon/brand.png') }}" alt=""></a>
                                </div>
                                <div class="right-content">
                                    <a href="#"><h4>Brand And Model</h4></a>
                                    <p>Brand = {{ $dataDVelg->brand_velg }}</p>
                                    <p>Model = {{ $dataDVelg->model_velg }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- col-lg-6 -->
        </div> <!-- row -->
    </div> <!-- container -->
</div> <!-- blog -->



<script>
function toggleLikeVelg(button) {
    const icon = button.querySelector('i');
    const data = {
        _token: '{{ csrf_token() }}',
        merk_velg: button.getAttribute('data-merk'),
        harga_velg: button.getAttribute('data-harga'),
        ukuran_velg: button.getAttribute('data-ukuran'),
        material_velg: button.getAttribute('data-material'),
        warna_velg: button.getAttribute('data-warna'),
    };

    fetch('{{ route('toggle.like.velg') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': data._token
        },
        body: JSON.stringify(data)
    })
    .then(res => res.json())
    .then(response => {
        if (response.liked) {
            icon.classList.remove('bi-heart');
            icon.classList.add('bi-heart-fill', 'text-danger');
        } else {
            icon.classList.remove('bi-heart-fill', 'text-danger');
            icon.classList.add('bi-heart');
        }
    });
}
</script>


@endsection