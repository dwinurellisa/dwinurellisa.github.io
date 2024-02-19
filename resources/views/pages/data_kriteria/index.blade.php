@extends('layout.master')

@section('title', 'Data Kriteria')

@push('css')
<link href="{{ asset('sbAdmin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="card border-top-primary shadow mb-4">
    <div class="card-body pt-3">
        <div class="mb-2">
            <a href="{{ route('create_kriteria') }}" class="btn btn-sm btn-primary">Tambah Kriteria</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="5%">Kode</th>
                        <th width="5%">Sifat</th>
                        <th>Kriteria</th>
                        <th class="text-center" width="5%">Bobot</th>
                        <th class="text-center" width="30%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kriteria as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->kriteria }}</td>
                        <td>{{ $item->sifat }}</td>
                        <td>{{ $item->detail }}</td>
                        <td class="text-center">{{ $item->bobot }}</td>
                        <td class="text-center">
                            <a href="{{ route('edit_kriteria', ['id' => $item->kdKriteria]) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Button to trigger the modal -->
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal{{ $item->kdKriteria }}">
                                View Details
                            </button>

                            <form action="{{ route('delete_kriteria', ['kdKriteria' => $item->kdKriteria]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kriteria ini?')">Delete</button>
                            </form>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{ $item->kdKriteria }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Kriteria Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Add modal content here based on your requirements -->
                                            Kriteria: {{ $item->kriteria }}<br>
                                            Sifat: {{ $item->sifat }}<br>
                                            Detail: {{ $item->detail }}<br>
                                            Bobot: {{ $item->bobot }}<br>
                                            <!-- You can customize this section based on your needs -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection

@push('js')
<!-- Page level plugins -->
<script src="{{ asset('sbAdmin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('sbAdmin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('sbAdmin/js/demo/datatables-demo.js') }}"></script>
@endpush