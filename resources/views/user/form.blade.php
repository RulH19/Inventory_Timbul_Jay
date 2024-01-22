@extends('layout.app')
@section('title','Form User')
@section('content')
<form action="{{ isset($user) ?route('user.tambah.update', $user->id) : route('user.tambah.simpan') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> {{  isset($user) ? 'Form Edit User':'Form Tambah User ' }}</h6>
                </div>                
                <div class="card-body">
                    <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control form-control-user" id="nama" name="nama" r value="{{ isset($user) ? $user->nama :'' }}" placeholder="Nama">
                    </div> 
                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input type="text" class="form-control form-control-user" id="email" name="email" r value="{{ isset($user) ? $user->email :'' }}" placeholder="Alamat Email">
                    </div>   
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control form-control-user" rror
                            id="exampleInputPassword" placeholder="Password">
                    </div>      
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" id="role" name="role">
                            <option value="" selected disabled hidden>-- Pilih Role User--</option>
                            <option value="admin" {{ isset($user) && $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="kasir" {{ isset($user) && $user->role == 'kasir' ? 'selected' : '' }}>Kasir</option>
                        </select>
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