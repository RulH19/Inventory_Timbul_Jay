@extends('layout.app')
@section('title', 'Data Barang')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Table Barang</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Data Barang</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <div class="table-responsive">
                            <form action="{{ route('barang') }}" method="GET" class="mb-3">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="search" placeholder="Cari berdasarkan ID Barang atau Nama Barang">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>                                        
                                        <th>Gambar Barang</th>
                                        <th>Id Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Stok</th>
                                    </tr>
                                </thead>                                
                                <tbody>
                                    @php
                                        ($no = 1)
                                    @endphp
                                    @foreach ($data as $index => $barang)
                                    <tr>
                                        <th>{{$index + $data->firstItem() }}</th>
                                        <td>
                                            <img src="{{ asset('img/' . $barang->gambar) }}" alt="{{ $barang->nama_barang }}" width="80" height="80">
                                        </td>
                                        <td>{{ $barang ->id_barang }}</td>
                                        <td>{{ $barang ->nama_barang }}</td>
                                        <td>{{ 'Rp '.number_format($barang->harga_beli, 0, ',', '.') }}</td>
                                        <td>{{ 'Rp '.number_format($barang->harga_jual, 0, ',', '.') }}</td>
                                        <td>{{ $barang ->stok }}</td>  
                                                                            
                                    </tr>                                        
                                    @endforeach
                                </tbody>                                
                            </table>
                            {{ $data ->links() }}
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection