@extends('layout.app')
@section('title', 'Jenis Barang')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Table Jenis Barang</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Data Jenis Barang</h4>
                            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'manager')
                            <a href="{{  route('jenisBarang.tambah') }}" class="btn btn-primary btn-round ml-auto">Tambah Jenis Barang</a>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Barang</th>
                                        <th>Nama Barang</th>                                   
                                    </tr>
                                </thead>                                
                                <tbody>
                                    @php
                                        ($no = 1)
                                    @endphp                                
                                    @foreach ($jenisBarang as $index => $barang)
                                    <tr>
                                        <th>{{ $index + $jenisBarang->firstItem() }}</th>
                                        <td>{{ $barang ->id_barang }}</td>
                                        <td>{{ $barang ->nama_barang }}</td>
                                        
                                        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'manager')
                                        <td>
                                            <a href="{{  route('jenisBarang.edit', $barang->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                            <button type="button" onclick="popupSwalJenisBarang({{ $barang->id }})" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                                        </td>
                                        @endif
                                    </tr>                                        
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $jenisBarang -> links() }}
                        </div>                        
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
@endsection
<script>
    function DeleteJenisBarang(id) {
        fetch('hapusJenisBarang/'+id, {
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
                console.log('Berhasil hapus :', data.message);
            })
            .catch(error => {
                console.error('Gagal hapus:', error);
            });
        };


        function popupSwalJenisBarang(id){
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
            
            DeleteJenisBarang(id);
            location.reload();
          }
        });
    }
</script>