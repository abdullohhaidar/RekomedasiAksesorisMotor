@extends('AdminPage.defaultFix')

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Basic Tables </h3>
        <nav aria-label="breadcrumb">
        
        </nav>
    </div>
    <div class="row">
        
    <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Bordered table</h4>
        </p>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th> # </th>
                <th> First name </th>
                <th> Progress </th>
                <th> Amount </th>
                <th> Deadline </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td> 1 </td>
                <td> Herman Beck </td>
                <td>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                </td>
                <td> $ 77.99 </td>
                <td> May 15, 2015 </td>
            </tr>
            <tr>
                <td> 2 </td>
                <td> Messsy Adam </td>
                <td>
                <div class="progress">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                </td>
                <td> $245.30 </td>
                <td> July 1, 2015 </td>
            </tr>
            <tr>
                <td> 3 </td>
                <td> John Richards </td>
                <td>
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                </td>
                <td> $138.00 </td>
                <td> Apr 12, 2015 </td>
            </tr>
            <tr>
                <td> 4 </td>
                <td> Peter Meggik </td>
                <td>
                <div class="progress">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                </td>
                <td> $ 77.99 </td>
                <td> May 15, 2015 </td>
            </tr>
            <tr>
                <td> 5 </td>
                <td> Edward </td>
                <td>
                <div class="progress">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                </td>
                <td> $ 160.25 </td>
                <td> May 03, 2015 </td>
            </tr>
            <tr>
                <td> 6 </td>
                <td> John Doe </td>
                <td>
                <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                </td>
                <td> $ 123.21 </td>
                <td> April 05, 2015 </td>
            </tr>
            <tr>
                <td> 7 </td>
                <td> Henry Tom </td>
                <td>
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                </td>
                <td> $ 150.00 </td>
                <td> June 16, 2015 </td>
            </tr>
            </tbody>
        </table>
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
@endsection