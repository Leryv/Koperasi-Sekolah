@extends('layouts.app')

@section('content')
<div class="col-lg-12">

    <div class="card">
        <h5 class="card-header">Edit Pengguna : {{$pegawai->name}}</h5>
        <div class="card-body">
            <form action="{{route('users.update', $pegawai->id)}}" method="post">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nip">NIP:</label>
                            <input type="number" name="nip" value="{{old('nip', $pegawai->nip)}}" id="nip" class="form-control"
                                placeholder="Nip...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" name="email" value="{{old('email', $pegawai->email)}}" id="email" class="form-control"
                                placeholder="Email...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" name="name" value="{{old('name', $pegawai->name)}}" id="nama" class="form-control"
                                placeholder="Nama...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin:</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="Laki-Laki" {{ $pegawai->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>
                                Laki-Laki
                                </option>
                                <option value="Perempuan" {{ $pegawai->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="jabatan">Jabatan:</label>
                            <input type="text" name="jabatan" value="{{old('jabatan', $pegawai->jabatan)}}" id="jabatan"
                                class="form-control" placeholder="Jabatan...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <input type="text" name="alamat" value="{{old('alamat', $pegawai->alamat)}}" id="alamat" class="form-control"
                                placeholder="Alamat...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">No Hp:</label>
                            <input type="number" name="phone" value="{{old('phone', $pegawai->phone)}}" id="phone" class="form-control"
                                placeholder="+62...">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="roles">Akses:</label>
                            <select name="roles" id="roles" class="form-control">
                                @foreach ($roles as $role)
                                    <option value="{{ $role }}" {{ $pegawai->roles->implode('name', ', ') == $role ? 'selected' : '' }}>
                                        {{ $role }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <button type="submit" class="btn btn-outline-primary">
                            Simpan
                        </button>
                        <a href="{{url()->previous()}}" type="submit" class="btn btn-outline-secondary">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
