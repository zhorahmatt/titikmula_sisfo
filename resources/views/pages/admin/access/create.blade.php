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
                    @if($errors->any())
                        <div class="alert alert-danger">
                            {{$errors->first()}}
                        </div>
                    @endif

                    <div class="col-md-8">
                        <form action="{{ route('access.store')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="nama_access">Nama Akses</label>
                                <input type="text" class="form-control" id="nama_access" name="nama_access" aria-describedby="nama_access" placeholder="Nama" value="{{ old('nama_access') }}">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">keterangan</label>
                                <input type="keterangan" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan" value="{{ old('keterangan') }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
