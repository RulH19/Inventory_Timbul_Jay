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
                                    @foreach ($data as $role)
                                    <tr>
                                        <th>{{ $no++}}</th>
                                        <td>{{ $role ->nama }}</td>
                                        <td>{{ $role ->email }}</td>
                                        <td>{{ $role ->role }}</td>
                                        <td>
                                            <a href="{{  route('user.hapus', $role->id) }}"  class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection