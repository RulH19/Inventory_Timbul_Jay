@extends('layout.app')
@section('title', 'Barang Keluar')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Barang Keluar</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Data Table Barang Keluar</h4>
                            <a href="{{  route('barangKeluar.tambah') }}" class="btn btn-primary btn-round ml-auto">Tambah Barang</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <div class="table-responsive">

                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Nama Customer</th>
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
                                        <td>{{ $barang ->nama_barang }}</td>
                                        <td>{{ 'Rp '.number_format($barang->harga, 0, ',', '.') }}</td>
                                        <td>{{ $barang ->stok }}</td>
                                        <td>{{ $barang ->nama_customer }}</td>
                                        <td>
                                            <a href="{{  route('barangKeluar.edit', $barang->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                            <button type="button" onclick="popupSwalBarangKeluar({{ $barang->id }})" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</button>
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
    function DeleteBarangKeluar(id) {
        fetch('hapusBarangKeluar/'+id, {
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
                // location.reload();
                console.log('1s');
                console.log('Booking status updated successfully:', data.message);
            })
            .catch(error => {
                console.error('Failed to update booking status:', error);
                console.log('2');
            });
        };


        function popupSwalBarangKeluar(id){
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
            
            DeleteBarangKeluar(id);
            location.reload();
          }
        });
    }
</script>