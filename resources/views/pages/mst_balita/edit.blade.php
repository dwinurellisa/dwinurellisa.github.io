@extends('layout.master')

@section('title', 'Detail Balita')

@section('content')
<div class="card border-top-primary shadow mb-4">
    <form action="" method="">
        @csrf
        <div class="card-body pt-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="nama_balita">Nama Balita</label>
                        <input type="text" class="form-control" name="nama_balita" id="nama_balita" value="{{ $balita->balita }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="umur_balita">Umur Balita</label>
                        <input type="text" class="form-control" name="umur_balita" id="umur_balita" value="{{ $data_balita->umur_bulan }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tinggi_balita">Tinggi Balita</label>
                        <input type="text" class="form-control" name="tinggi_balita" id="tinggi_balita" value="{{ $data_balita->tinggi_badan }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="berat_balita">Berat Balita</label>
                        <input type="text" class="form-control" name="berat_balita" id="berat_balita" value="{{ $data_balita->berat_badan }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin:</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" readonly>
                            <option value="1" {{ $balita->id_role == '1' ? 'selected' : '' }}>laki-laki</option>
                            <option value="2" {{ $balita->id_role == '2' ? 'selected' : '' }}>perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="col-md-3">Kriteria</th>
                                    <th colspan="5" class="text-center col-md-9">Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataView as $item)
                                <tr>
                                    <td>{{ $item['nama'] . '(' . $item['detail'] . ')' }}</td>

                                    @php
                                    $no = 1;
                                    @endphp

                                    @foreach ($item['data'] as $dataItem)
                                    @php
                                    $isChecked = false;
                                    if (isset($nilai)) {
                                    foreach ($nilai as $value) {
                                    if ($value->kdKriteria == $dataItem->kdKriteria && $value->nilai == $dataItem->value) {
                                    $isChecked = true;
                                    break;
                                    }
                                    }
                                    } elseif ($no == 3) {
                                    $isChecked = true;
                                    }
                                    @endphp

                                    <td>
                                        <input type="radio" name="nilai[{{ $dataItem->kdKriteria }}]" value="{{ $dataItem->value }}" {{ $isChecked ? 'checked' : '' }} disabled />
                                        {{ $dataItem->subKriteria }}
                                    </td>

                                    @php
                                    $no++;
                                    @endphp
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </form>

    <div class="card-footer text-right">
        <a class="btn btn-sm btn-primary" href="{{ route('data_balita') }}">Back</a>
    </div>

</div>
@endsection