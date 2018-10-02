@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Manajemen Penulis</div>

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
                                    <th scope="col" width="30%">Penulis</th>
                                    <th scope="col" >Deskripsi</th>
                                    <th scope="col" width="15%">Action</th>
                                </tr>
                            </thead>

                            <a href="{{ route('kategori.create') }}" class="btn btn-success">Tambah</a>
                            
                            <tbody>
                                Terdapat : {{$kategori->count()}} kategori dalam pangkalan data ini.<br/>
                                @if ($kategori->count() != 0)
                                    @foreach ($kategori as $key => $thiskategori)
                                        <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            <td>{{ $thiskategori->nama_kategori }}</td>
                                            <td>{{ $thiskategori->deskripsi_kategori }}</td>
                                            <td>
                                                <a href="{{ route('kategori.edit',['id' => $thiskategori->id]) }}">Ubah</a> ||
                                                <a href="{{ route('kategori.delete',['id' => $thiskategori->id]) }}">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">Data kategori Tidak Ditemukan</td>
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
