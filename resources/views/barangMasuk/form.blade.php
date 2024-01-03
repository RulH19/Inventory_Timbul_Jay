@extends('layout.app')
@section('title','Form Barang')
@section('content')
<form action="{{ isset($barang) ?route('barangMasuk.tambah.update', $barang->id) : route('barangMasuk.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> {{  isset($barang) ? 'Form Edit Barang Masuk':'Form Tambah Barang Masuk' }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_barang">Id Barang</label>
                        <select name="id_barang" id="id_barang" class="custom-select">
                            <option value="{{ isset($barang) ? $barang->nama_barang :'' }}" selected disabled hidden>-- Pilih Jenis Barang --</option>
                            @foreach ($jenisBarang as $row)
                                <option value="{{ $row->nama_barang }}" {{ isset($barang) ? ($barang->id_barang == $row->id_barang ? 'selected' : '') : '' }}>{{ $row->id_barang }}</option>
                            @endforeach
                        </select>
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
                        <label for="nama_penerima">Nama Penerima</label>
                        <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" value="{{ isset($barang) ? $barang->nama_penerima :'' }}">
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