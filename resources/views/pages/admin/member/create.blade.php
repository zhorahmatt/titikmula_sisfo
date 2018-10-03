@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tambah Member</div>

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
                        <form action="{{ route('member.store')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" aria-describedby="nama" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" aria-describedby="tempat_lahir" placeholder="Ex : Makassar">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" aria-describedby="tanggal_lahir" placeholder="Tanggal Lahir">
                            </div>
                            <div class="form-group">
                                <label for="no_identitas">Nomor Identitas</label>
                                <input type="text" name="no_identitas" id="no_identitas" class="form-control" aria-describedby="no_identitas" placeholder="KTP/SIM/Kartu Pelajar">
                            </div>
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input type="text" name="instagram" id="instagram" class="form-control" aria-describedby="instagram" placeholder="username instagram">
                            </div>
                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input type="text" name="twitter" id="twitter" class="form-control" aria-describedby="twitter" placeholder="username twitter">
                            </div>
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input type="text" name="facebook" id="facebook" class="form-control" aria-describedby="facebook" placeholder="username facebook">
                            </div>
                            <div class="form-group">
                                <label for="telp">Telepon</label>
                                <input type="text" name="telp" id="telp" class="form-control" aria-describedby="telp" placeholder="Nomor Telepon">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" aria-describedby="alamat" placeholder="Alamat">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
