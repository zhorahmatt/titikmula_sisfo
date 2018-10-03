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
                        <form action="{{ route('penulis.store')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="nama_penulis">Nama Penulis</label>
                                <input type="text" class="form-control" id="nama_penulis" name="nama_penulis" aria-describedby="nama_penulis" placeholder="Nama Penulis">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                            </div>
                            <div class="form-group">
                                <label for="instagram">instagram</label>
                                <input type="text" class="form-control" id="instagram" name="instagram" placeholder="instagram">
                            </div>
                            <div class="form-group">
                                <label for="facebook">facebook</label>
                                <input type="text" class="form-control" id="facebook" name="facebook" placeholder="facebook">
                            </div>
                            <div class="form-group">
                                <label for="twitter">twitter</label>
                                <input type="text" class="form-control" id="twitter" name="twitter" placeholder="twitter">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
