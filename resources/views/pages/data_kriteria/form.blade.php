@extends('layout.master')

@section('title', 'Tambah Kriteria')

@section('content')
<div class="card border-top-primary shadow mb-4">
    <form action="{{ route('store_kriteria') }}" method="POST">
        @csrf
        <div class="card-body pt-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Kode Kriteria</label>
                        <input type="text" class="form-control" name="kode_kriteria">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="inputSifat">Sifat</label><br>
                        <label class="radio-inline">
                            <input type="radio" name="sifat" value="B"> Benefit
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="sifat" value="C"> Cost
                        </label>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Nama Kriteria</label>
                        <input type="text" class="form-control" name="nama_kriteria">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Bobot Kriteria</label>
                        <input type="number" class="form-control" name="bobot_kriteria">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Item Kriteria</label>
                        <div class="mb-3">
                            <input type="itemKriteria1" class="form-control" name="itemKriteria1" placeholder="Value 1">
                        </div>
                        <div class="mb-3">
                            <input type="itemKriteria2" class="form-control" name="itemKriteria2" placeholder="Value 2">
                        </div>
                        <div class="mb-3">
                            <input type="itemKriteria3" class="form-control" name="itemKriteria3" placeholder="Value 3">
                        </div>
                        <div class="mb-3">
                            <input type="itemKriteria4" class="form-control" name="itemKriteria4" placeholder="Value 4">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-sm btn-primary">Tambah</button>
        </div>
    </form>
</div>
@endsection