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
                        <form action="{{ route('user.update', ['id' => $user->id ])}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Nama" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="email" value="{{ $user->email }}" disabled>
                                <small>*email tidak bisa diganti, silakan hubungi admin untuk menggantinya</small>
                            </div>
                            <div class="form-group">
                                <label for="roles">Jenis User</label>
                                <select name="roles" id="roles" class="form-control">
                                    <option value="000">-- Jenis User --</option>
                                    @foreach ($roles as $role)
                                        <option value="{{$role->nama_roles}}"
                                            @foreach ($user->roles as $userRole)
                                                @if ($userRole->nama_roles == $role->nama_roles) selected @endif    
                                            @endforeach>
                                            
                                            {{ $role->nama_roles }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
