@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Manajemen Buku</div>
                    <div class="">
                        <div class="row">
                            <div class="col-md-12">
                                @if(Session::has('success') || Session::has('failed'))
                                <br>
                                <div class="alert {{ !empty(Session::has('success')) ? 'alert-success' : 'alert-warning' }}">
                                    {{-- <i class="material-icons">{{ !empty(Session::has('success')) ? 'check' : 'warning' }}</i> --}}
                                    {{ empty(Session::has('success')) ? Session::get('failed') : Session::get('success') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">#</th>
                                    <th scope="col" width="10%">Kategori</th>
                                    <th scope="col" width="30%">Judul Buku</th>
                                    <th scope="col" >Penulis</th>
                                    <th scope="col" >Penerbit</th>
                                    <th scope="col" width="15%">Action</th>
                                </tr>
                            </thead>

                            <a href="{{ route('buku.create') }}" class="btn btn-success">Tambah</a>
                            
                            <tbody>
                                Terdapat : {{$buku->count()}} buku dalam pangkalan data ini.<br/>
                                @if ($buku->count() != 0)
                                    @foreach ($buku as $key => $thisBuku)
                                        <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            <td>
                                                @foreach ($thisBuku->toKategori as $kategori)
                                                    {{ $kategori->nama_kategori }}
                                                @endforeach
                                            </td>
                                            <td>{{ $thisBuku->judul_buku }}</td>
                                            <td>{{ $thisBuku->toPenulis->nama_penulis }}</td>
                                            <td>{{ $thisBuku->toPenerbit->nama_penerbit }}</td>
                                            <td>
                                                <a href="{{ route('buku.edit',['id' => $thisBuku->id]) }}">Ubah</a> ||
                                                <a href="{{ route('buku.delete',['id' => $thisBuku->id]) }}">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">Data buku Tidak Ditemukan</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
