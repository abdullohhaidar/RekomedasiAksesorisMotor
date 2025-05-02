@extends('AdminPage.defaultFix')

@section('content')
    <!-- Tambahkan ini di <head> HTML-mu jika belum ada -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <div class="page-header">
        <h3 class="page-title"> Tabel Velg </h3>
        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#productModalAdd">
            <i class="fas fa-plus"></i> 
        </a>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Daftar Produk</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> Nama </th>
                                <th> Merk </th>
                                <th> Harga </th>
                                <th> Ukuran </th>
                                <th> Material </th>
                                <th> Warna </th>
                                <th> Brand </th>
                                <th> Model </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($dataVelg as $index => $velg)
                            <tr>
                                <td> {{ $index + 1 }} </td>
                                <td> {{ $velg->nama_velg }} </td>
                                <td> {{ $velg->merk_velg }} </td>
                                <td> Rp{{ number_format($velg->harga_velg, 0, ',', '.') }} </td>
                                <td> {{ $velg->ukuran_velg }} </td>
                                <td> {{ $velg->material_velg }} </td>
                                <td> {{ $velg->warna_velg }} </td>
                                <td> {{ $velg->brand_velg }} </td>
                                <td> {{ $velg->model_velg }} </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#productModalEdit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                    <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            
                            @empty
                            <tr>
                                <td colspan="11" class="text-center">Data tidak tersedia</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Produk -->
    <div class="modal fade" id="productModalAdd" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-4 shadow-sm">

                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Form Produk Velg</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>

                <div class="modal-body">
                    <form id="productForm" action="{{ route('velg.input') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="nama_velg" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="nama_velg" name="nama_velg" required>
                        </div>

                        <div class="mb-3">
                            <label for="merk_velg" class="form-label">Merk</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="merk_velg" name="merk_velg" required>
                        </div>

                        <div class="mb-3">
                            <label for="harga_velg" class="form-label">Harga</label>
                            <input type="number" class="form-control border border-secondary rounded-3" id="harga_velg" name="harga_velg" required>
                        </div>

                        <div class="mb-3">
                            <label for="ukuran_velg" class="form-label">Ukuran</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="ukuran_velg" name="ukuran_velg" required>
                        </div>

                        <div class="mb-3">
                            <label for="material_velg" class="form-label">Material</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="material_velg" name="material_velg" required>
                        </div>

                        <div class="mb-3">
                            <label for="warna_velg" class="form-label">Warna</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="warna_velg" name="warna_velg" required>
                        </div>

                        <div class="mb-3">
                            <label for="brand_velg" class="form-label">Brand</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="brand_velg" name="brand_velg" required>
                        </div>

                        <div class="mb-3">
                            <label for="model_velg" class="form-label">Model</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="model_velg" name="model_velg" required>
                        </div>

                        <div class="mb-3">
                            <label for="gambar_velg" class="form-label">Gambar</label>
                            <input type="file" class="form-control border border-secondary rounded-3" id="gambar_velg" name="gambar_velg" accept="image/*" required>
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>



    <!-- Modal Edit Produk -->
    <div class="modal fade" id="productModalEdit" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-4 shadow-sm">

                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Form Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>

                <div class="modal-body">
                    <form id="productForm">

                        <!-- Setiap input diberi style tambahan -->
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="nama" name="nama" required>
                        </div>

                        <div class="mb-3">
                            <label for="merk" class="form-label">Merk</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="merk" name="merk" required>
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="harga" name="harga" required>
                        </div>

                        <div class="mb-3">
                            <label for="ukuran" class="form-label">Ukuran</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="ukuran" name="ukuran" required>
                        </div>

                        <div class="mb-3">
                            <label for="material" class="form-label">Material</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="material" name="material" required>
                        </div>

                        <div class="mb-3">
                            <label for="warna" class="form-label">Warna</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="warna" name="warna" required>
                        </div>

                        <div class="mb-3">
                            <label for="brand" class="form-label">Brand</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="brand" name="brand" required>
                        </div>

                        <div class="mb-3">
                            <label for="model" class="form-label">Model</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="model" name="model" required>
                        </div>

                        <div class="mb-3">
                            <label for="model" class="form-label">Gambar</label>
                            <input type="file" class="form-control border border-secondary rounded-3" id="model" name="model" required>
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>



        
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
        </div>
    </footer> 

    <script>
    (() => {
        'use strict'
        const form = document.getElementById('produkForm');
        form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
        }, false);
    })();
    </script>

@endsection