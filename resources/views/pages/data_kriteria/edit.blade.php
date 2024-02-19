@extends('layout.master')

@section('title', 'Edit Kriteria')

@section('content')
<div class="card border-top-primary shadow mb-4">
    <div class="card-body">
        <form action="{{ route('update_kriteria', ['id' => $id]) }}" method="POST">


            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="kode_kriteria">Kode Kriteria</label>
                <input type="text" class="form-control" name="kode_kriteria" value="{{ $kriteria->kriteria }}">
            </div>

            <div class="form-group">
                <label for="sifat">Sifat Kriteria</label>
                <select class="form-control" name="sifat">
                    <option value="B" {{ $kriteria->sifat == 'B' ? 'selected' : '' }}>Benefit</option>
                    <option value="C" {{ $kriteria->sifat == 'C' ? 'selected' : '' }}>Cost</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nama_kriteria">Nama Kriteria</label>
                <input type="text" class="form-control" name="nama_kriteria" value="{{ $kriteria->detail }}">
            </div>

            <div class="form-group">
                <label for="bobot_kriteria">Bobot Kriteria</label>
                <input type="number" class="form-control" name="bobot_kriteria" value="{{ $kriteria->bobot }}">
            </div>

            <div class="form-group">
                <label for="itemKriteria">Item Kriteria</label>
                @if ($subkriteria)
                @foreach ($subkriteria as $item)
                <div class="mb-3">
                    <input type="text" class="form-control" name="itemKriteria[]" value="{{ $item->subKriteria }}">
                </div>
                @endforeach
                @endif
            </div>



            <button class="btn btn-primary" type="submit">Perbarui</button>
        </form>
    </div>
</div>
@endsection