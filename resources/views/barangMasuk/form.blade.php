@extends('layout.app')
@section('title','Form Barang')
@section('content')
<form action="{{ isset($barang) ?route('barangMasuk.tambah.update', $barang->id) : route('barangMasuk.tambah.simpan') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> {{  isset($barang) ? 'Form Edit Barang Masuk':'Form Tambah Barang Masuk' }}</h6>
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
                        <label for="harga">Harga Barang</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="{{ isset($barang) ? $barang->harga :'' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok Barang</label>
                        <input type="number" class="form-control" id="stok" name="stok" value="{{ isset($barang) ? $barang->stok :'' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_penerima">Nama Penerima</label>
                        <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" value="{{ isset($barang) ? $barang->nama_penerima :'' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Gambar Barang</label>
                        @if(isset($barang) && $barang->gambar)
                            <input type="file" class="form-control" id="gambar" name="gambar" required>
                            <img src="{{ isset($barang) ? asset('img/'.$barang->gambar) : asset('img/placeholder_image.png') }}" height="150" width="150">
                            <small>Gambar lama akan diganti jika kamu mengunggah gambar baru.</small>
                        @else
                            
                            <input type="file" class="form-control" id="gambar" name="gambar" required>
                            <img src="{{ isset($barang) ? asset('img/'.$barang->gambar) : asset('img/placeholder_image.png') }}" height="150" width="150">
                        @endif
                        
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