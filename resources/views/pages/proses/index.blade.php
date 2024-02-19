@extends('layout.master')

@section('title', 'Proses Penilaian')

@push('css')
<link href="{{ url('sbAdmin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<?php
if (!$output) {
?>
    <div class="card border-top-primary shadow mb-4">
        <h4 style="text-align: center;margin:40px">
            Data masih Kosong
        </h4>
    </div>
<?php
} else {
?>
    <div class="card border-top-primary shadow mb-4">
        <div class="card-body pt-3">
            <div>
                <h4 style="color: #000000;">Data Masing Masing Balita Terhadap Kriteria</h4>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="datatable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Balita</th>
                            @foreach($output[0]['normalized_nilai'] as $normalized_nilai)
                            <th>
                                {{ $normalized_nilai['kriteria'] }}
                            </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($output as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item['nama_balita'] }}</td>
                            @foreach($item['nilai'] as $nilai)
                            <td>
                                {{ $nilai['nilai'] }}
                            </td>
                            @endforeach
                            <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
                            <!-- <td>
                            <a href="javascript:void(0);" class="btn btn-primary btn-sm" onclick="printRow({{ $index }})">Print</a>
                        </td>-->
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <div class="card border-top-primary shadow mb-4">
        <div class="card-body pt-3">
            <div>
                <h4 style="color: #000000;">Menghitung Nilai Normalisasi</h4>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Balita</th>
                            @foreach($output[0]['normalized_nilai'] as $normalized_nilai)
                            <th>
                                {{ $normalized_nilai['kriteria'] }}
                            </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($output as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item['nama_balita'] }}</td>
                            @foreach($item['normalized_nilai'] as $nilaiItem)
                            <td>
                                {{ $nilaiItem['nilai'] }} / {{ $nilaiItem['nilaimaximum'] }}
                            </td>
                            @endforeach
                            <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
                            <!-- <td>
                            <a href="javascript:void(0);" class="btn btn-primary btn-sm" onclick="printRow({{ $index }})">Print</a>
                        </td>-->
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <div class="card border-top-primary shadow mb-4">
        <div class="card-body pt-3">
            <div>
                <h4 style="color: #000000;">Hasil Nilai Normalisasi</h4>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="datatable3" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Balita</th>
                            @foreach($output[0]['normalized_nilai'] as $normalized_nilai)
                            <th>
                                {{ $normalized_nilai['kriteria'] }}
                            </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($output as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item['nama_balita'] }}</td>
                            @foreach($item['normalized_nilai'] as $nilaiItem)
                            <td>
                                {{ $nilaiItem['normalized'] }}
                            </td>
                            @endforeach
                            <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
                            <!-- <td>
                            <a href="javascript:void(0);" class="btn btn-primary btn-sm" onclick="printRow({{ $index }})">Print</a>
                        </td>-->
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <div class="card border-top-primary shadow mb-4">
        <div class="card-body pt-3">
            <div>
                <h4 style="color: #000000;">Menghitung Nilai Preferensi</h4>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="datatable4" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Balita</th>
                            @foreach($output[0]['normalized_nilai'] as $normalized_nilai)
                            <th>
                                {{ $normalized_nilai['kriteria'] }}
                            </th>
                            <th>
                                Hasil {{ $normalized_nilai['kriteria'] }}
                            </th>
                            @endforeach
                            <th>
                                Total Preferensi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($output as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item['nama_balita'] }}</td>
                            @foreach($item['normalized_nilai'] as $nilaiItem)
                            <td>
                                {{$nilaiItem['bobot']}} x {{ $nilaiItem['normalized'] }}
                            </td>
                            <td>
                                {{$nilaiItem['nilai_preferensi']}}
                            </td>
                            @endforeach
                            <td>
                                {{$item['total_preferensi']}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <div class="card border-top-primary shadow mb-4">
        <div class="card-body pt-3">
            <div>
                <h4 style="color: #000000;">Status Gizi</h4>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="datatable5" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Balita</th>
                            <th>Nilai Preferensi</th>
                            <th>
                                Status Gizi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($output as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item['nama_balita'] }}</td>
                            <td>
                                {{$item['total_preferensi']}}
                            </td>
                            <td>
                                {{$item['kategori_gizi']}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable2').DataTable();
            $('#datatable').DataTable();
            $('#datatable3').DataTable();
            $('#datatable4').DataTable();
            $('#datatable5').DataTable();
        });
    </script>
<?php
}
?>
@endsection
@push('js')
<!-- Page level plugins -->
<script src="{{ url('sbAdmin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('sbAdmin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ url('sbAdmin/js/demo/datatables-demo.js') }}"></script>
@endpush