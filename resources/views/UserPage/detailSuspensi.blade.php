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
                        <h4>Details <em>Product Suspension</em></h4>
                        <div class="line-dec"></div>
                    </div>
                </div>

                <div class="col-lg-6 show-up wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="blog-post">
                        <div class="thumb">
                            <a href="#"><img src="{{ asset('storage/images/suspensi/' . $dataDSuspensi->gambar_suspensi) }}" alt="{{ $dataDSuspensi->nama_suspensi }}"></a>
                        </div>
                        <div class="down-content">
                            <span class="category">Rp. {{ number_format($dataDSuspensi->harga_suspensi, 0, ',', '.') }}</span>
                            <span class="date" style="margin-top: 50px;">
                                <button id="likeButton" onclick="toggleLikeSuspensi(this)" 
                                    data-merk="{{ $dataDSuspensi->merk_suspensi }}"
                                    data-harga="{{ $dataDSuspensi->harga_suspensi }}"
                                    data-ukuran="{{ $dataDSuspensi->ukuran_suspensi }}"
                                    data-warna="{{ $dataDSuspensi->warna_suspensi }}"
                                    class="btn p-4 rounded-circle" style="background-color: white; border: none; box-shadow: none;">
                                    <i id="heartIcon" class="bi {{ $liked ? 'bi-heart-fill text-danger' : 'bi-heart text-secondary' }}" style="font-size: 2.5rem;"></i>
                                </button>
                            </span>
                            <a href="#"><h4>{{ $dataDSuspensi->merk_suspensi }}</h4></a>
                            <p>{{ $dataDSuspensi->nama_suspensi }}</p>
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
                                        <p>Size = {{ $dataDSuspensi->ukuran_suspensi }} </p>
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
                                        <p>{{ $dataDSuspensi->tipe_motor }}</p>
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
                                        <p>{{ $dataDSuspensi->warna_suspensi }}</p>
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
                                        <p>Brand = {{ $dataDSuspensi->merk_suspensi }}</p>
                                        <p>Model = {{ $dataDSuspensi->model_suspensi }}</p>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .row -->
                    </div> <!-- .blog-posts -->
                </div> <!-- .col-lg-6 -->
            </div>
        </div>
    </div>

<script>
function toggleLikeSuspensi(button) {
    const icon = button.querySelector('i');
    const data = {
        _token: '{{ csrf_token() }}',
        merk_suspensi: button.getAttribute('data-merk'),
        harga_suspensi: button.getAttribute('data-harga'),
        ukuran_suspensi: button.getAttribute('data-ukuran'),
        warna_suspensi: button.getAttribute('data-warna'),
    };

    fetch('{{ route('toggle.like.suspensi') }}', {
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