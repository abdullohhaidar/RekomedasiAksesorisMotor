@extends('AdminPage.defaultFix')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<div class="page-header">
        <h3 class="page-title"> Tabel Shockbreaker </h3>
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
                                <th> motor </th>
                                <th> Warna </th>
                                <th> Model </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($dataSuspensi as $index => $suspensi)
                            <tr>
                                <td> {{ $index + 1 }} </td>
                                <td> {{ $suspensi->nama_suspensi }} </td>
                                <td> {{ $suspensi->merk_suspensi }} </td>
                                <td> Rp{{ number_format($suspensi->harga_suspensi, 0, ',', '.') }} </td>
                                <td> {{ $suspensi->ukuran_suspensi }} </td>
                                <td> {{ $suspensi->tipe_motor }} </td>
                                <td> {{ $suspensi->warna_suspensi }} </td>
                                <td> {{ $suspensi->model_suspensi }} </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#productModalEdit" onclick="showEditModal({{$suspensi->id_suspensi }})">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                    <form action="{{ route('suspensi.destroy', $suspensi->id_suspensi) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
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
                    <h5 class="modal-title" id="productModalLabel">Form Produk Suspensi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>

                <div class="modal-body">
                    <form id="productForm" action="{{ route('suspensi.input') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="nama_suspensi" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="nama_suspensi" name="nama_suspensi" required>
                        </div>

                        <div class="mb-3">
                            <label for="merk_suspensi" class="form-label">Merk</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="merk_suspensi" name="merk_suspensi" required>
                        </div>

                        <div class="mb-3">
                            <label for="harga_suspensi" class="form-label">Harga</label>
                            <input type="number" class="form-control border border-secondary rounded-3" id="harga_suspensi" name="harga_suspensi" required>
                        </div>

                        <div class="mb-3">
                            <label for="ukuran_suspensi" class="form-label">Ukuran</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="ukuran_suspensi" name="ukuran_suspensi" required>
                        </div>

                        <div class="mb-3">
                            <label for="tipe_motor" class="form-label">Motor</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="tipe_motor" name="tipe_motor" required>
                        </div>

                        <div class="mb-3">
                            <label for="warna_suspensi" class="form-label">Warna</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="warna_suspensi" name="warna_suspensi" required>
                        </div>


                        <div class="mb-3">
                            <label for="model_suspensi" class="form-label">Model</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="model_suspensi" name="model_suspensi" required>
                        </div>

                        <div class="mb-3">
                            <label for="gambar_suspensi" class="form-label">Gambar</label>
                            <input type="file" class="form-control border border-secondary rounded-3" id="gambar_suspensi" name="gambar_suspensi" accept="image/*" required>
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
                    <form id="productForm" action="{{ route('suspensi.update', $suspensi->id_suspensi) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                        <!-- Setiap input diberi style tambahan -->

                        <div class="mb-3">
                            <input type="hidden" id="edit_id_suspensi" name="id_suspensi">
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="edit_nama_suspensi" name="nama_suspensi" required>
                        </div>

                        <div class="mb-3">
                            <label for="merk" class="form-label">Merk</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="edit_merk_suspensi" name="merk_suspensi" required>
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="edit_harga_suspensi" name="harga_suspensi" required>
                        </div>

                        <div class="mb-3">
                            <label for="ukuran" class="form-label">Ukuran</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="edit_ukuran_suspensi" name="ukuran_suspensi" required>
                        </div>

                        <div class="mb-3">
                            <label for="material" class="form-label">Tipe Motor</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="edit_tipe_motor_suspensi" name="tipe_motor" required>
                        </div>

                        <div class="mb-3">
                            <label for="warna" class="form-label">Warna</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="edit_warna_suspensi" name="warna_suspensi" required>
                        </div>


                        <div class="mb-3">
                            <label for="model" class="form-label">Model</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="edit_model_suspensi" name="model_suspensi" required>
                        </div>

                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="gambar_suspensi_lama" name="gambar_suspensi_lama">
                        </div>

                        <div class="mb-3">
                            <label for="gambar_suspensi" class="form-label">Gambar</label>
                            
                            <!-- Preview gambar lama -->
                            <div class="mb-2">
                                <img id="preview_gambar_suspensi" src="" alt="Preview Gambar" style="max-height: 120px;">
                            </div>

                            <!-- Input file -->
                            <input type="file" class="form-control border border-secondary rounded-3" id="gambar_suspensi_baru" name="gambar_suspensi" accept="image/*" >
                           
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
    function showEditModal(id) {
        // Ambil data suspensi berdasarkan ID via AJAX
        fetch('/suspensi/' + id)
            .then(response => response.json())
            .then(data => {
                // Isi form dengan data yang didapat
                // document.getElementById('productForm').action = '/suspensi/update/' + data.id;
                document.getElementById('edit_id_suspensi').value = data.id_suspensi;
                document.getElementById('edit_nama_suspensi').value = data.nama_suspensi;
                document.getElementById('edit_merk_suspensi').value = data.merk_suspensi;
                document.getElementById('edit_harga_suspensi').value = data.harga_suspensi;
                document.getElementById('edit_ukuran_suspensi').value = data.ukuran_suspensi;
                document.getElementById('edit_tipe_motor_suspensi').value = data.tipe_motor;
                document.getElementById('edit_warna_suspensi').value = data.warna_suspensi;
                document.getElementById('edit_model_suspensi').value = data.model_suspensi;
                document.getElementById('preview_gambar_suspensi').src = '/storage/images/suspensi/' + data.gambar_suspensi;
                document.getElementById('gambar_suspensi_lama').value = data.gambar_suspensi;
                document.getElementById('gambar_suspensi_lama_baru').value = data.gambar_suspensi;
                   
                // gambar tidak bisa dipreview langsung dari path (jika perlu, bisa tampilkan di tag <img>)
                
                // Tampilkan modal
                const modalEdit = new bootstrap.Modal(document.getElementById('productModalEdit'));
                modalEdit.show();
            })
            .catch(error => {
                console.error('Gagal mengambil data:', error);
            });
    }
    </script>
@endsection