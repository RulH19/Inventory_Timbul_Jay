@extends('layout.app')
@section('title', 'User')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Table User</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Data User</h4>
                            <a href="{{  route('user.tambah') }}" class="btn btn-primary btn-round ml-auto">Tambah User</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user') }}" method="GET" class="mb-3">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="search" placeholder="Cari berdasarkan username, email, atau role">
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </form>
                        <!-- Modal -->
                        <div class="table-responsive">

                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Alamat Email</th>    
                                        <th>Role</th>                                
                                    </tr>
                                </thead>                                
                                <tbody>
                                    @php
                                        ($no = 1)
                                    @endphp
                                    @foreach ($data as $index => $role)
                                    <tr>
                                        <th>{{ $index + $data ->firstItem()}}</th>
                                        <td>{{ $role ->nama }}</td>
                                        <td>{{ $role ->email }}</td>
                                        <td>{{ $role ->role }}</td>
                                        <td>
                                            <button type="button" onclick="popupSwalUser('{{ $role->id }}')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                                        </td>
                                    </tr>                                        
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $data -> links() }}
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
<script>
    function DeleteUser(id) {
        fetch('hapus/'+ id, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' 
                },
                body: JSON.stringify({
                    id: id,
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Berhasil hapus:', data.message);
            })
            .catch(error => {
                console.error('Gagal Hapus:', error);
            });
        };


        function popupSwalUser(id){
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
            
            DeleteUser(id);
            location.reload();
          }
        });
    }
</script>