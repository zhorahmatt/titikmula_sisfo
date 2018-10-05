@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Manajemen Penulis</div>

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
                                    <th scope="col" width="30%">Nama</th>
                                    <th scope="col" >Email</th>
                                    <th scope="col" width="15%">Action</th>
                                </tr>
                            </thead>

                            <a href="{{ route('access.create') }}" class="btn btn-success">Tambah</a>
                            
                            <tbody>
                                Terdapat : {{$access->count()}} user dalam pangkalan data ini.<br/>
                                @if ($access->count() != 0)
                                    @foreach ($access as $key => $thisAccess)
                                        <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            <td>{{ $thisAccess->nama_access }}</td>
                                            <td>{{ $thisAccess->keterangan }}</td>
                                            <td>
                                                <a href="{{ route('access.edit',['id' => $thisAccess->id]) }}">Ubah</a> ||
                                                <a href="{{ route('access.delete',['id' => $thisAccess->id]) }}">Hapus</a>
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
