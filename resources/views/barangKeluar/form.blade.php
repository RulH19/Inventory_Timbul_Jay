@extends('layout.app')
@section('title','Form Barang')
@section('content')
<form action="{{ isset($barang) ?route('barangKeluar.tambah.update', $barang->id) : route('barangKeluar.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> {{  isset($barang) ? 'Form Edit Barang Keluar':'Form Tambah Barang Keluar' }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_barang">Id Barang</label>
                        <input type="text" class="form-control" id="id_barang" name="id_barang" value="{{ isset($barang) ? $barang->id_barang :'' }}">
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ isset($barang) ? $barang->nama_barang :'' }}">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Barang</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="{{ isset($barang) ? $barang->harga :'' }}">
                    </div>
                    <div class="form-group">
                        <label for="stok">stok Barang</label>
                        <input type="number" class="form-control" id="stok" name="stok" value="{{ isset($barang) ? $barang->stok :'' }}">
                    </div>
                    <div class="form-group">
                        <label for="nama_customer">Nama Customer</label>
                        <input type="text" class="form-control" id="nama_customer" name="nama_customer" value="{{ isset($barang) ? $barang->nama_customer :'' }}">
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