@extends('layout.app')
@section('title', 'Barang Masuk')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Barang Masuk</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Data Table Barang Masuk</h4>
                            <a href="{{  route('barangMasuk.tambah') }}" class="btn btn-primary btn-round ml-auto">Tambah Barang</a>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('barangMasuk') }}" method="GET" class="mb-3">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="search" placeholder="Cari berdasarkan ID Barang, Nama Penerima, atau Tanggal">
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Barang</th>
                                        <th>Harga Beli</th>
                                        <th>Stok</th>
                                        <th>Nama Penerima</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>                                
                                <tbody>
                                    @php
                                        ($no = 1)
                                    @endphp
                                    @foreach ($data as $index => $barang)
                                    <tr>
                                        <th>{{ $index + $data->firstItem() }}</th>
                                        <td>{{ $barang ->id_barang }}</td>
                                        <td>{{ 'Rp '.number_format($barang->harga, 0, ',', '.') }}</td>
                                        <td>{{ $barang ->stok }}</td>
                                        <td>{{ $barang ->nama_penerima }}</td>
                                        <td>{{ $barang->tanggal }}</td>  
                                        <td>
                                            <a href="{{  route('barangMasuk.edit', $barang->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                            <button type="button" onclick="popupSwalBarangMasuk({{ $barang->id }})" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</button></td>
                                        </td>
                                    </tr>                                        
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $data ->links()}}
                        </div>                        
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
@endsection
<script>
    function DeleteBarangMasuk(id) {
        fetch('hapusBarangMasuk/'+id, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' 
                },
                body: JSON.stringify({
                    id_barang: id,
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Berhasil Hapus:', data.message);
            })
            .catch(error => {
                console.error('Gagal Hapus :', error);;
            });
        };


        function popupSwalBarangMasuk(id){
        Swal.fire({
          title: "Apakah anda yakin?",
          text: "Data akan di hapus permanent",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Ya"
        }).then((result) => {
          if (result.isConfirmed) {
            
            DeleteBarangMasuk(id);
            location.reload();
          }
        });
    }
</script>