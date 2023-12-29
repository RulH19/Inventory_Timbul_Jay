@extends('layout.app')
@section('title','Form Barang')
@section('content')
<form action="{{ isset($barangMasuk) ?route('barangMasuk.tambah.update', $barangMasuk->id) : route('barangMasuk.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> {{  isset($barangMasuk) ? 'Form Edit Barang Masuk':'Form Tambah Barang Masuk' }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_barang">Id Barang</label>
                        <input type="text" class="form-control" id="id_barang" name="id_barang" value="{{ isset($barangMasuk) ? $barangMasuk->id_barang :'' }}">
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ isset($barangMasuk) ? $barangMasuk->nama_barang :'' }}">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Barang</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="{{ isset($barangMasuk) ? $barangMasuk->harga :'' }}">
                    </div>
                    <div class="form-group">
                        <label for="stok">stok Barang</label>
                        <input type="number" class="form-control" id="stok" name="stok" value="{{ isset($barangMasuk) ? $barangMasuk->stok :'' }}">
                    </div>
                    <div class="form-group">
                        <label for="nama_penerima">Nama Penerima</label>
                        <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" value="{{ isset($barangMasuk) ? $barangMasuk->nama_penerima :'' }}">
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