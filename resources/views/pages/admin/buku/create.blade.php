@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tambah Buku</div>

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
                        <form action="{{ route('buku.store')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="judul_buku">Judul Buku</label>
                                <input type="text" class="form-control" id="judul_buku" name="judul_buku" aria-describedby="judul_buku" placeholder="Judul Buku">
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select name="kategori" id="kategori" class="form-control">
                                    <option value="-">-- Kategori --</option>
                                    @foreach ($kategori as $kategori)
                                        <option value="{{ $kategori->id}}">{{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="penulis">Penulis</label>
                                <select name="penulis" id="penulis" class="form-control">
                                    <option value="-">-- Penulis --</option>
                                    @foreach ($penulis as $penulis)
                                        <option value="{{ $penulis->id}}">{{ $penulis->nama_penulis }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="penerbit">Penerbit</label>
                                <select name="penerbit" id="penerbit" class="form-control">
                                    <option value="-">-- Penerbit --</option>
                                    @foreach ($penerbit as $penerbit)
                                        <option value="{{ $penerbit->id}}">{{ $penerbit->nama_penerbit }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
