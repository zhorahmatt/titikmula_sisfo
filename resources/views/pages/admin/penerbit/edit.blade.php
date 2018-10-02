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
                        <form action="{{ route('penerbit.update', ['id' => $penerbit->id ])}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label for="nama_penerbit">Nama Penerbit</label>
                                <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit" value="{{$penerbit->nama_penerbit}}" aria-describedby="nama_penerbit" placeholder="Nama Penulis">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="{{ $penerbit->alamat }}">
                            </div>
                            <div class="form-group">
                                <label for="telp">telp</label>
                                <input type="text" class="form-control" id="telp" name="telp" placeholder="telp" value="{{ $penerbit->telp }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
