@extends('layouts.app')

@section('content')
<div class="col-lg-12">

    <div class="card">
        <h5 class="card-header">Formulir pengguna baru</h5>
        <div class="card-body">
            <form action="{{route('users.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nip">NIP:</label>
                            <input type="number" name="nip" value="{{old('nip')}}" id="nip" class="form-control {{ $errors->has('nip') ? ' is-invalid' : '' }}" placeholder="Nip...">
                            @if ($errors->has('nip'))
                            <span class="invalid-feedback pl-5" role="alert">
                                    <strong>{{ $errors->first('nip') }}</strong>
                            <span>   
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" name="email" value="{{old('email')}}" id="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email...">
                            @if ($errors->has('email'))
                            <span class="invalid-feedback pl-5" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                            <span>   
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" name="name" value="{{old('name')}}" id="nama" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nama...">
                            @if ($errors->has('name'))
                            <span class="invalid-feedback pl-5" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                            <span>   
                            @endif
                        
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin:</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control {{ $errors->has('jenis_kelamin') ? ' is-invalid' : '' }}">
                                <option value="">Pleace select one</option>
                                <option value="pria">Pria</option>
                                <option value="wanita">Wanita</option>
                            </select>
                            @if ($errors->has('jenis_kelamin'))
                            <span class="invalid-feedback pl-5" role="alert">
                                    <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                            <span>   
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="jabatan">Jabatan:</label>
                            <input type="text" name="jabatan" value="{{old('jabatan')}}" id="jabatan" class="form-control{{ $errors->has('jabatan') ? ' is-invalid' : '' }}" placeholder="Jabatan...">
                            @if ($errors->has('jabatan'))
                            <span class="invalid-feedback pl-5" role="alert">
                                    <strong>{{ $errors->first('jabatan') }}</strong>
                            <span>   
                            @endif
                            
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <input type="text" name="alamat" value="{{old('alamat')}}" id="alamat" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" placeholder="Alamat...">
                            @if ($errors->has('alamat'))
                            <span class="invalid-feedback pl-5" role="alert">
                                    <strong>{{ $errors->first('alamat') }}</strong>
                            <span>   
                            @endif

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="phone">No Hp:</label>
                            <input type="number" name="phone" value="{{old('phone')}}" id="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="+62...">
                            @if ($errors->has('phone'))
                            <span class="invalid-feedback pl-5" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                            <span>   
                            @endif

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" value="" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="******">
                            @if ($errors->has('password'))
                            <span class="invalid-feedback pl-5" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                            <span>   
                            @endif
                           
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="roles">Akses:</label>
                            <select name="roles" id="roles" class="form-control{{ $errors->has('roles') ? ' is-invalid' : '' }}">
                                <option value="">Please select one</option>
                                @foreach ($roles as $role)
                                    <option value="{{$role}}">{{$role}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('roles'))
                            <span class="invalid-feedback pl-5" role="alert">
                                    <strong>{{ $errors->first('roles') }}</strong>
                            <span>   
                            @endif

                        </div>
                    </div>

                    <div class="col-md-4">
                        <button type="submit" class="btn btn-outline-primary">
                            Simpan
                        </button>
                        <a  class="btn btn-outline-secondary">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
