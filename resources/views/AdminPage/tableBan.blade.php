@extends('AdminPage.defaultFix')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<div class="page-header">
        <h3 class="page-title"> Tabel Tire </h3>
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
                                <th> Tipe </th>
                                <th> Motor </th>
                                <th> Model </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($dataBan as $index => $ban)
                            <tr>
                                <td> {{ $index + 1 }} </td>
                                <td> {{ $ban->nama_ban }} </td>
                                <td> {{ $ban->merk_ban }} </td>
                                <td> Rp{{ number_format($ban->harga_ban, 0, ',', '.') }} </td>
                                <td> {{ $ban->ukuran_ban }} </td>
                                <td> {{ $ban->tipe_ban }} </td>
                                <td> {{ $ban->tipe_motor }} </td>
                                <td> {{ $ban->model_ban }} </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#productModalEdit" onclick="showEditModal({{$ban->id_ban }})">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                    <form action="{{ route('ban.destroy', $ban->id_ban) }}" method="POST" style="display:inline;">
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
                    <h5 class="modal-title" id="productModalLabel">Form Produk Ban</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>

                <div class="modal-body">
                    <form id="productForm" action="{{ route('ban.input') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="nama_ban" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="nama_ban" name="nama_ban" required>
                        </div>

                        <div class="mb-3">
                            <label for="merk_ban" class="form-label">Merk</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="merk_ban" name="merk_ban" required>
                        </div>

                        <div class="mb-3">
                            <label for="harga_ban" class="form-label">Harga</label>
                            <input type="number" class="form-control border border-secondary rounded-3" id="harga_ban" name="harga_ban" required>
                        </div>

                        <div class="mb-3">
                            <label for="ukuran_ban" class="form-label">Ukuran</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="ukuran_ban" name="ukuran_ban" required>
                        </div>

                        <div class="mb-3">
                            <label for="tipe_ban" class="form-label">Tipe</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="tipe_ban" name="tipe_ban" required>
                        </div>

                        <div class="mb-3">
                            <label for="tipe_motor" class="form-label">Motor</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="tipe_motor" name="tipe_motor" required>
                        </div>


                        <div class="mb-3">
                            <label for="model_ban" class="form-label">Model</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="model_ban" name="model_ban" required>
                        </div>

                        <div class="mb-3">
                            <label for="gambar_ban" class="form-label">Gambar</label>
                            <input type="file" class="form-control border border-secondary rounded-3" id="gambar_ban" name="gambar_ban" accept="image/*" required>
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
                    <form id="productForm" action="{{ route('ban.update', $ban->id_ban) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Setiap input diberi style tambahan -->
                        <div class="mb-3">
                            <input type="hidden" id="edit_id_ban" name="id_ban">
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="edit_nama_ban" name="nama_ban" required>
                        </div>

                        <div class="mb-3">
                            <label for="merk" class="form-label">Merk</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="edit_merk_ban" name="merk_ban" required>
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="edit_harga_ban" name="harga_ban" required>
                        </div>

                        <div class="mb-3">
                            <label for="ukuran" class="form-label">Ukuran</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="edit_ukuran_ban" name="ukuran_ban" required>
                        </div>

                        <div class="mb-3">
                            <label for="material" class="form-label">Tipe Motor</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="edit_tipe_ban" name="tipe_ban" required>
                        </div>

                        <div class="mb-3">
                            <label for="warna" class="form-label">Warna</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="edit_tipe_motor_ban" name="tipe_motor" required>
                        </div>


                        <div class="mb-3">
                            <label for="model" class="form-label">Model</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="edit_model_ban" name="model_ban" required>
                        </div>

                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="gambar_ban_lama" name="gambar_ban_lama">
                        </div>

                        <div class="mb-3">
                            <label for="gambar_ban" class="form-label">Gambar</label>
                            
                            <!-- Preview gambar lama -->
                            <div class="mb-2">
                                <img id="preview_gambar_ban" src="" alt="Preview Gambar" style="max-height: 120px;">
                            </div>

                            <!-- Input file -->
                            <input type="file" class="form-control border border-secondary rounded-3" id="gambar_ban_baru" name="gambar_ban" accept="image/*" >
                           
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
        // Ambil data ban berdasarkan ID via AJAX
        fetch('/ban/' + id)
            .then(response => response.json())
            .then(data => {
                // Isi form dengan data yang didapat
                // document.getElementById('productForm').action = '/ban/update/' + data.id;
                document.getElementById('edit_id_ban').value = data.id_ban;
                document.getElementById('edit_nama_ban').value = data.nama_ban;
                document.getElementById('edit_merk_ban').value = data.merk_ban;
                document.getElementById('edit_harga_ban').value = data.harga_ban;
                document.getElementById('edit_ukuran_ban').value = data.ukuran_ban;
                document.getElementById('edit_tipe_ban').value = data.tipe_ban;
                document.getElementById('edit_tipe_motor_ban').value = data.tipe_motor;
                document.getElementById('edit_model_ban').value = data.model_ban;
                document.getElementById('preview_gambar_ban').src = '/storage/images/ban/' + data.gambar_ban;
                document.getElementById('gambar_ban_lama').value = data.gambar_ban;
                document.getElementById('gambar_ban_lama_baru').value = data.gambar_ban;
                   
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