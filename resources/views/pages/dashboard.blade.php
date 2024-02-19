@extends('layout.master')

@section('title', 'Dashboard')

@push('css')
<style>
    /* Gaya CSS untuk footer */
    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        background-color: #f8f9fa; /* Atur warna latar belakang sesuai kebutuhan */
        padding: 10px; /* Atur padding sesuai kebutuhan */
        text-align: center; /* Atur penataan teks sesuai kebutuhan */
        border-top: 1px solid #e3e6f0; /* Atur garis tepi sesuai kebutuhan */
    }
</style>
@endpush

@section('content')
    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Balita</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countdataBalita }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Pemeriksaan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countdatanilaibalita }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content Row -->
@endsection

@push('js')
<!-- Page level plugins -->
<script src="{{ url('sbAdmin/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ url('sbAdmin/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ url('sbAdmin/js/demo/chart-pie-demo.js') }}"></script>
@endpush
