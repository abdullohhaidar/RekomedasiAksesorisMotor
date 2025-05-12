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
                                <th> Merk </th>
                                <th> Material </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($dataKatVelg as $index => $velg)
                            <tr>
                                <td> {{ $index + 1 }} </td>
                                <td> {{ $velg->merk_velg }} </td>
                                <td> {{ $velg->material_velg }} </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#productModalEdit" onclick="showEditModal({{$velg->id_kategori_velg }})">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                    <form action="{{ route('katVelg.destroy', $velg->id_kategori_velg ) }}" method="POST" style="display:inline;">
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
                    <h5 class="modal-title" id="productModalLabel">Form Produk Velg</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>

                <div class="modal-body">
                <form id="productForm" action="{{ route('katVelg.input') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        

                        <div class="mb-3">
                            <label for="merk_velg" class="form-label">Merk</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="merk_velg" name="merk_velg" required>
                        </div>

                        <div class="mb-3">
                            <label for="material_velg" class="form-label">Material</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="material_velg" name="material_velg" required>
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
                <form id="productForm" action="{{ route('katVelg.update', $velg->id_kategori_velg) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                        <!-- Setiap input diberi style tambahan -->
                        <div class="mb-3">
                            <input type="hidden" id="edit_id_velg" name="id_kategori_velg">
                        </div>


                        <div class="mb-3">
                            <label for="merk" class="form-label">Merk</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="edit_merk_velg" name="merk_velg" required>
                        </div>

                        <div class="mb-3">
                            <label for="material" class="form-label">Material</label>
                            <input type="text" class="form-control border border-secondary rounded-3" id="edit_material_velg" name="material_velg" required>
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
        // Ambil data velg berdasarkan ID via AJAX
        
        fetch('/katVelg/' + id)
            .then(response => response.json())
            .then(data => {
                
                // const form = document.getElementById('productForm');
                // const baseRoute = form.getAttribute('data-route');
                // form.action = baseRoute.replace('ID_PLACEHOLDER', data.id_velg);
                // document.getElementById('productForm').action = '/velg/update/' + data.id_velg;
                document.getElementById('edit_id_velg').value = data.id_kategori_velg;
                document.getElementById('edit_merk_velg').value = data.merk_velg;
                document.getElementById('edit_material_velg').value = data.material_velg;
                document.getElementById('edit_bug_velg').value = data.material_velg;
                   
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