@extends('layout.master')

@section('title', 'Data Penilaian')

@push('css')
<link href="{{ url('sbAdmin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="card border-top-primary shadow mb-4">
    <div class="card-body pt-3">
        <div class="table-responsive">
            <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Tanggal Timbang</th>
                        <th>Nama Balita</th>
                        <th>Berat Badan</th>
                        <th>Tinggi Badan</th>
                        <th>Nilai Preferensi</th>
                        <th>Kategori Gizi</th>
                        <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
                        <!-- <th>Aksi</th>  -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($output as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item['tanggal_timbang'] }}</td>
                        <td>{{ $item['nama_balita'] }}</td>
                        <td>{{ $item['berat_badan'] }}</td>
                        <td>{{ $item['tinggi_badan'] }}</td>
                        <td>{{ $item['total_preferensi'] }}</td>
                        <td>{{ $item['kategori_gizi'] }}</td>
                        <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
                        <!-- <td>
                            <a href="javascript:void(0);" class="btn btn-primary btn-sm" onclick="printRow({{ $index }})">Print</a>
                        </td> -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="text-right mb-3">
    <a href="javascript:void(0);" class="btn btn-primary" onclick="printAll()">Print All</a>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });

    function printAll() {
        var table = $('#datatable').DataTable();
        var printWindow = window.open('', '', 'width=800,height=600');
        printWindow.document.open();
        printWindow.document.write('<html><head><title>Cetak Data Penilaian</title></head><body>');
        printWindow.document.write('<style>table { border-collapse: collapse; } table, th, td { border: 1px solid #000; }</style>'); // Tambahkan CSS untuk mengatur ketebalan garis
        printWindow.document.write('<h2>Data Penilaian</h2>');
        printWindow.document.write('<table style="width:100%">');
        printWindow.document.write('<tr><th>No</th><th>Tanggal Timbang</th><th>Nama Balita</th><th>Berat Badan</th><th>Tinggi Badan</th><th>Nilai Preferensi</th><th>Kategori Gizi</th></tr>');

        table.rows().every(function(rowIdx, tableLoop, rowLoop) {
            var data = this.data();
            printWindow.document.write('<tr><td>' + (rowIdx + 1) + '</td><td>' + data[1] + '</td><td>' + data[2] + '</td><td>' + data[3] + '</td><td>' + data[4] + '</td><td>' + data[5] + '</td><td>' + data[6] + '</td></tr>');
        });

        printWindow.document.write('</table>');
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }

</script>
@endsection

@push('js')
<!-- Page level plugins -->
<script src="{{ url('sbAdmin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('sbAdmin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ url('sbAdmin/js/demo/datatables-demo.js') }}"></script>
@endpush