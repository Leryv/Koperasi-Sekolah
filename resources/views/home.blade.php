@extends('layouts.app')

@section('content')
<div class="col-lg-6 col-md-6 mx-auto">
    <div class="card card-user justify-content-center card card-user">
        <div class="image">
            <img src="{{asset('assets/Img/wallpaperbetter.jpg')}}" width="100%" alt="...">
        </div>
        <br>
        <div class="d-flex justify-content-center">
            <div class="content text-center">
                <img class="avatar border-white" src="{{asset('assets/Img/businessman.png')}}"  alt="...">
                <h4 class="title font-weight-border">{{Auth::user()->name}}<br>
                <a href="#" class="text-muted">
                    <small>{{Auth::user()->email}}</small>
                </a>
            </h4>
            <small>ONLINE</small>
            </div>
        </div>
        <hr>
        <div class="text-center">
            <div class="row">
                @role('anggota')
                <div class="col-md-4 col-md-offset-1">
                    <h5>
                        Rp.5000
                        <br>
                        <small class="text-muted">Saldo Simpanan</small>
                    </h5>
                </div>
                @else
                <div class="col-md-4 col-md-offset-1">
                    <h5>Rp.5000</h5>
                    <br>
                    <small>Tabungan</small>
                </div>
                @endrole
                @role('anggota')
                <div class="col-md-3">
                    <h5>
                        jumlah
                        <br>
                        <small class="text-muted">Dana Pinjaman</small>
                    </h5>
                </div>
                @else
                <div class="col-md-3">
                    <h5>
                        pengajuan
                    </h5>
                    <br>
                    <small>Data Pinjaman</small>
                </div>
                @endrole
                @role('anggota')
                <div class="col-md-3">
                    <h5>
                        Rp.5000
                        <br>
                        <small class="text-muted">Total Pinjaman</small>
                    </h5>
                </div>
                @else
                <div class="col-md-3">
                    <h5>
                        Rp.5000  
                    </h5>
                    <br>
                    <small>Total Pinjaman</small>
                </div>
                @endrole
                @role('anggota')
                <div class="col-md-4">
                    <h5>
                       pengajuan
                        <br>
                        <small class="text-muted">Pengajuan Pinjaman</small>
                    </h5>
                </div>
                @else
                <div class="col-md-4">
                    <h5>
                       pengajuan
                    </h5>
                    <br>
                    <small class="text-muted">Pengajuan Pinjaman</small>
                </div>
                @endrole
                @role('anggota')
                <div class="col-md-4">
                    <h5>
                      penarikan
                        <br>
                        <a href="">
                            <small class="text-muted">Penarikan</small>
                        </a>
                    </h5>
                </div>
                @else   
                <div class="col-md-4">
                    <h5 class="mb-3">
                    pengajuan
                    </h5>
                    <a href="">
                        <small class="text-muted">Penarikan</small>
                    </a>
                </div>
                @endrole
            </div>
        </div>
    </div>
</div>
@endsection