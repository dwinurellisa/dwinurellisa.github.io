@extends('layout.master')

@section('title', 'Tambah Balita')

@section('content')
<div class="card border-top-primary shadow mb-4">
    <div class="card-body">
        <h5 class="card-title">Tambah Balita</h5>
        <form action="{{ route('store_data') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_balita">Nama Balita</label>
                <input type="text" class="form-control" id="nama_balita" name="nama_balita" required>
            </div>
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" required>
            </div>
            <div class="form-group">
                <label for="nama_orangtua">Nama Orangtua</label>
                <input type="text" class="form-control" id="nama_orangtua" name="nama_orangtua" required>
            </div>
            <div class="form-group">
                <label for="alamat_rt_rw">Alamat RT/RW</label>
                <input type="text" class="form-control" id="alamat_rt_rw" name="alamat_rt_rw" required>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="1">Laki-laki</option>
                    <option value="2">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
            </div>
            <div class="form-group">
                <label for="tanggal_timbang">Tanggal Timbang</label>
                <input type="date" class="form-control" id="tanggal_timbang" name="tanggal_timbang" required>
            </div>
            <div class="form-group">
                <label for="umur_bulan">Umur (BLN)</label>
                <input type="number" class="form-control" id="umur_bulan" name="umur_bulan" required readonly>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#tanggal_lahir, #tanggal_timbang').on('change', function() {
                        var tanggal_lahir = new Date($('#tanggal_lahir').val());
                        var tanggal_timbang = new Date($('#tanggal_timbang').val());

                        // Calculate the difference in months
                        var umur_bulan = (tanggal_timbang.getFullYear() - tanggal_lahir.getFullYear()) * 12 +
                            tanggal_timbang.getMonth() - tanggal_lahir.getMonth();

                        // Set umur_bulan to a minimum of 0
                        umur_bulan = Math.max(0, umur_bulan);

                        // Update the umur_bulan input field
                        $('#umur_bulan').val(umur_bulan);
                    });
                });
            </script>
            <div class="form-group">
                <label for="berat_badan">Berat Badan</label>
                <input type="text" class="form-control" id="berat_badan" name="berat_badan" required>
            </div>
            <div class="form-group">
                <label for="tinggi_badan">Tinggi Badan</label>
                <input type="text" class="form-control" id="tinggi_badan" name="tinggi_badan" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection