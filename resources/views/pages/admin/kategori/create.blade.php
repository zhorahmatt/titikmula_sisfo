@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tambah Penulis</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>

                    <div class="col-md-8">
                        <form action="{{ route('kategori.store')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="nama_kategori">Nama kategori</label>
                                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" aria-describedby="nama_kategori" placeholder="Nama kategori">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi_kategori">Deskripsi</label>
                                <input type="text" class="form-control" id="deskripsi_kategori" name="deskripsi_kategori" placeholder="Deskripsi">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
