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
                        <form action="{{ route('penulis.update', ['id' => $penulis->id ])}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label for="nama_penulis">Nama Penulis</label>
                                <input type="text" class="form-control" id="nama_penulis" name="nama_penulis" value="{{$penulis->nama_penulis}}" aria-describedby="nama_penulis" placeholder="Nama Penulis">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="{{ $penulis->alamat }}">
                            </div>
                            <div class="form-group">
                                <label for="instagram">instagram</label>
                                <input type="text" class="form-control" id="instagram" name="instagram" placeholder="instagram" value="{{ $penulis->instagram_penulis }}">
                            </div>
                            <div class="form-group">
                                <label for="facebook">facebook</label>
                                <input type="text" class="form-control" id="facebook" name="facebook" placeholder="facebook" value="{{ $penulis->facebook_penulis }}">
                            </div>
                            <div class="form-group">
                                <label for="twitter">twitter</label>
                                <input type="text" class="form-control" id="twitter" name="twitter" placeholder="twitter" value="{{ $penulis->twitter_penulis }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
