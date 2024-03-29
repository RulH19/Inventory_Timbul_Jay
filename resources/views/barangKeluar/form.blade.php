@extends('layout.app')
@section('title','Form Barang')
@section('content')
<form action="{{ isset($barang) ?route('barangKeluar.tambah.update', $barang->id) : route('barangKeluar.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> {{  isset($barang) ? 'Form Edit Barang Keluar':'Form Pilih Barang Keluar' }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_barang">ID Barang</label>
                        <select name="id_barang" id="id_barang" class="custom-select" required>
                            <option value="" selected disabled hidden>-- Pilih Jenis Barang --</option>
                            @foreach ($jenisBarang as $row)
                                <option value="{{ $row->id_barang }}" {{ isset($barang) ? ($barang->id_barang == $row->id_barang ? 'selected' : '') : '' }}>
                                    {{ $row->id_barang }} == {{ $row->nama_barang }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Jual</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="{{ isset($barang) ? $barang->harga :'' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="stok">Jumlah Barang</label>
                        <input type="number" class="form-control" id="stok" name="stok" value="{{ isset($barang) ? $barang->stok :'' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_customer">Nama Customer</label>
                        <input type="text" class="form-control" id="nama_customer" name="nama_customer" value="{{ isset($barang) ? $barang->nama_customer :'' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_input">Tanggal Input</label>
                        <input type="date" class="form-control" id="tanggal_input" name="tanggal_input" value="{{ isset($barang) ? $barang->created_at->toDateString() : '' }}" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection()