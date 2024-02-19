@extends('layout.master')

@section('title', 'Data Balita')

@push('css')
<link href="{{ url('sbAdmin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="card border-top-primary shadow mb-4">
    <div class="card-body pt-3">
        <div class="mb-2">
            <a href="{{ route('create_data') }}" class="btn btn-sm btn-primary">Tambah Balita</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Balita</th>
                        <th>NIK</th>
                        <th>Nama Orangtua</th>
                        <th>Alamat RT/RW</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Tanggal Timbang</th>
                        <th>Umur (BLN)</th>
                        <th>Berat Badan</th>
                        <th>Tinggi Badan</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($balitas as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nama_balita }}</td>
                        <td>{{ $item->nik }}</td>
                        <td>{{ $item->nama_orangtua }}</td>
                        <td>{{ $item->alamat_rt_rw }}</td>
                        <td>{{ $item->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan' }}</td>
                        <td>{{ $item->tanggal_lahir }}</td>
                        <td>{{ $item->tanggal_timbang }}</td>
                        <td>{{ $item->umur_bulan }}</td>
                        <td>{{ $item->berat_badan }}</td>
                        <td>{{ $item->tinggi_badan }}</td>
                        <td class="text-center">
                            <form action="{{ route('delete_data', ['id' => $item->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus balita ini?')">Delete</button>
                            </form>
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
        $('#datatable').DataTable();
    });
</script>
@endsection

@push('js')
<!-- Page level plugins -->
<script src="{{ url('sbAdmin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('sbAdmin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ url('sbAdmin/js/demo/datatables-demo.js') }}"></script>
@endpush
