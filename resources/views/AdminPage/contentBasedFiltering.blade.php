@extends('AdminPage.defaultFix')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="page-header">
    <h3 class="page-title"> Content Based Filtering </h3>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form method="GET" action="{{ route('adminCBF') }}">
                    <label for="user_id">Pilih User:</label>
                    <select name="user_id" id="user_id" onchange="this.form.submit()" class="form-select mb-4">
                        <option value="">-- Semua User --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id_user }}" {{ request('user_id') == $user->id_user ? 'selected' : '' }}>
                                {{ $user->username }}
                            </option>
                        @endforeach
                    </select>
                </form>

                <h5 class="mb-3">Rekomendasi Velg</h5>
                <table class="table table-bordered mb-5">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Frekuensi Total</th>
                            <th>Frekuensi History </th>
                            <th>Jumlah Keyword Cocok</th>
                            <th>Keyword Cocok</th>
                            <th>Total Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rekomendasiVelg as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->frekuensi_total }}</td>
                                <td>{{ $item->frekuensi_history }}</td>
                                <td>{{ $item->frekuensi_keyword }}</td>
                                <td>{{ $item->keyword_cocok }}</td>
                                <td>{{ $item->score }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="5">Tidak ada data</td></tr>
                        @endforelse
                    </tbody>
                </table>

                <h5 class="mb-3">Rekomendasi Ban</h5>
                <table class="table table-bordered mb-5">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Frekuensi Total</th>
                            <th>Frekuensi History </th>
                            <th>Jumlah Keyword Cocok</th>
                            <th>Keyword Cocok</th>
                            <th>Total Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rekomendasiBan as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->frekuensi_total }}</td>
                                <td>{{ $item->frekuensi_history }}</td>
                                <td>{{ $item->frekuensi_keyword }}</td>
                                <td>{{ $item->keyword_cocok }}</td>
                                <td>{{ $item->score }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="5">Tidak ada data</td></tr>
                        @endforelse
                    </tbody>
                </table>

                <h5 class="mb-3">Rekomendasi Suspensi</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Frekuensi Total</th>
                            <th>Frekuensi History </th>
                            <th>Jumlah Keyword Cocok</th>
                            <th>Keyword Cocok</th>
                            <th>Total Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rekomendasiSuspensi as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->frekuensi_total }}</td>
                                <td>{{ $item->frekuensi_history }}</td>
                                <td>{{ $item->frekuensi_keyword }}</td>
                                <td>{{ $item->keyword_cocok }}</td>
                                <td>{{ $item->score }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="5">Tidak ada data</td></tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<footer class="footer mt-5">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
            Copyright © 2023 
            <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.
        </span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
            Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i>
        </span>
    </div>
</footer>

@endsection
