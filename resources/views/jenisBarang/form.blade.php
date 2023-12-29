@extends('layout.app')
@section('title','Form Jenis Barang')
@section('content')
<form action="{{ isset($jenisBarang) ?route('jenisBarang.tambah.update', $jenisBarang->id) : route('jenisBarang.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> {{  isset($jenisBarang) ? 'Form Edit Jenis Barang':'Form Tambah Jenis Barang ' }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_barang">Id Barang</label>
                        <input type="text" class="form-control" id="id_barang" name="id_barang" value="{{ isset($jenisBarang) ? $jenisBarang->id_barang :'' }}">
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ isset($jenisBarang) ? $jenisBarang->nama_barang :'' }}">
                    </div>                   
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection()