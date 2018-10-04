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
                        <form action="{{ route('buku.update', ['id' => $buku->id ])}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label for="judul_buku">Judul Buku</label>
                                <input type="text" class="form-control" id="judul_buku" name="judul_buku" aria-describedby="judul_buku" placeholder="Judul Buku" value="{{ $buku->judul_buku }}">
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select name="kategori" id="kategori" class="form-control">
                                    <option value="-">-- Kategori --</option>
                                    @foreach ($kategori as $kategori)
                                        <option value="{{ $kategori->id}}"  @if ($buku->kategori == $kategori->id) selected @endif>{{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="penulis">Penulis</label>
                                <select name="penulis" id="penulis" class="form-control">
                                    <option value="-">-- Penulis --</option>
                                    @foreach ($penulis as $penulis)
                                        <option value="{{ $penulis->id}}" @if ($buku->penulis == $penulis->id) selected @endif>{{ $penulis->nama_penulis }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="penerbit">Penerbit</label>
                                <select name="penerbit" id="penerbit" class="form-control">
                                    <option value="-">-- Penerbit --</option>
                                    @foreach ($penerbit as $penerbit)
                                        <option value="{{ $penerbit->id}}"  @if ($buku->penerbit == $penerbit->id) selected @endif>{{ $penerbit->nama_penerbit }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control">{{ $buku->deskripsi }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="jml_halaman">Jumlah Halaman</label>
                                <input type="text" name="jml_halaman" id="jml_halaman" class="form-control" value="{{ $buku->jml_halaman }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
