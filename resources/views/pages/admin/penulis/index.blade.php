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
                                    <th scope="col" >Alamat</th>
                                    <th scope="col" width="15%">Action</th>
                                </tr>
                            </thead>

                            <a href="{{ route('penulis.create') }}" class="btn btn-success">Tambah</a>
                            
                            <tbody>
                                Terdapat : {{$penulis->count()}} penulis dalam pangkalan data ini.<br/>
                                @if ($penulis->count() != 0)
                                    @foreach ($penulis as $key => $thisPenulis)
                                        <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            <td>{{ $thisPenulis->nama_penulis }}</td>
                                            <td>{{ $thisPenulis->alamat }}</td>
                                            <td>
                                                <a href="">Ubah</a> ||
                                                <a href="">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">Data Penulis Tidak Ditemukan</td>
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
