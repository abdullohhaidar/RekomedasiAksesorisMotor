@extends('AdminPage.defaultFix')

@section('content')
<!-- Tambahkan ini di <head> HTML-mu jika belum ada -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="page-header">
    <h3 class="page-title"> Frekuensi Atau Pembobotan </h3>
    <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#productModalAdd">
        <i class="fas fa-plus"></i> 
    </a>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"></h4>

                <!--  Dropdown filter user -->
                <form method="GET" action="{{ route('adminFrekuensi') }}" class="mb-3">
                    <label for="id_user">Pilih User : </label>
                    <select name="id_user" id="id_user" class="form-select" style="width: 150px; display: inline-block;" onchange="this.form.submit()">
                        @foreach ($daftarUser as $user)
                            <option value="{{ $user->id_user }}" {{ $selectedUserId == $user->id_user ? 'selected' : '' }}>
                                {{ $user->username }}
                            </option>
                        @endforeach
                    </select>
                </form>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> Keyword </th>
                            <th> Frekuensi </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($keywordFrekuensi as $keyword => $frekuensi)
                        <tr>
                            <td> {{ $keyword }} </td>
                            <td> {{ $frekuensi }} </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="text-center">Data tidak tersedia</td>
                        </tr>
                        @endforelse
                        <tr>
                            <td><strong>Total Bobot</strong></td>
                            <td><strong>{{ $totalBobot }}</strong></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<!-- content-wrapper ends -->
<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 
            <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.
        </span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
            Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i>
        </span>
    </div>
</footer>

@endsection
