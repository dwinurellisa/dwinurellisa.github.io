@extends('layout.master')

@section('title', 'Edit Player')

@section('content')
<div class="card border-top-primary shadow mb-4">
    <form action="{{ route('store_balita') }}" method="POST">
        @csrf
        <div class="card-body pt-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="nama_balita">Nama Balita</label>
                        <input type="text" class="form-control" name="nama_balita" id="nama_balita" value="{{ $balita->balita }}">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin:</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
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
                                <?php foreach ($dataView as $item) : ?>
                                    <tr>
                                        <td><?php echo $item['nama'] . '(' . $item['detail'] . ')'; ?></td>

                                        <?php
                                        $no = 1;
                                        foreach ($item['data'] as $dataItem) :
                                            $isChecked = false;
                                            if (isset($nilai)) {
                                                foreach ($nilai as $value) {
                                            ?>
                                                    
                                            <?php
                                                    if ($value->kdKriteria == $dataItem->kdKriteria && $value->nilai == $dataItem->value) {
                                                        $isChecked = true;
                                                        break;
                                                    }
                                                }
                                            } elseif ($no == 3) {
                                                $isChecked = true;
                                            }
                                            ?>
                                            <td>
                                                <input type="radio" name="nilai[<?php echo $dataItem->kdKriteria ?>]" value="<?php echo $dataItem->value ?>" <?php echo $isChecked ? 'checked' : '' ?> /> <?php echo $dataItem->subKriteria; ?>

                                            </td>
                                        <?php
                                            $no++;
                                        endforeach;
                                        ?>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-sm btn-primary" type="submit">Tambah</button>
        </div>
    </form>
</div>
@endsection