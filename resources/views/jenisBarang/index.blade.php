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
                                    @foreach ($jenisBarang as $barang)
                                    <tr>
                                        <th>{{ $no++}}</th>
                                        <td>{{ $barang ->id_barang }}</td>
                                        <td>{{ $barang ->nama_barang }}</td>
                                        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'manager')
                                        <td>
                                            <a href="{{  route('jenisBarang.edit', $barang->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                            <a href="{{  route('jenisBarang.hapus', $barang->id) }}"  class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                        </td>
                                        @endif
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