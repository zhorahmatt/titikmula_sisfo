@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Ubah Data Penulis</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>

                    <div class="col-md-8">
                        <form action="{{ route('role.update', ['id' => $roles->id ])}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label for="nama_roles">Nama Roles</label>
                                <input type="text" class="form-control" id="nama_roles" name="nama_roles" aria-describedby="nama_roles" placeholder="Nama" value="{{ $roles->nama_roles }}">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">keterangan</label>
                                <input type="keterangan" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan" value="{{ $roles->keterangan }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
