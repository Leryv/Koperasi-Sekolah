@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0">
                    <div class="card-body rounded-lg">
                        <p class="text-muted text-center mb-4 align-items-center">
                            Formulir Angsuran Pinjaman
                        </p>
                        <div class="d-flex justify-content-center mb-5">
                            <div class="alert alert-info" role="alert">
                                Angsuran atas nama :
                                <strong class="text-danger">
                                    {{$loan->user->name}}
                                </strong>
                            </div>
                        </div>
                        <form action="{{route('installments.store', $loan->id)}}" method="POST">
                            @csrf
                            <div class="input-group mb-4 shadow-sm">
                                <div class="input-group-prepend">
                                    <div class="input-group-text border-0 bg-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20"
                                            class="mr-2zZZZ">
                                            <path fill="#eeeeee"
                                                d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm1-5h1a3 3 0 0 0 0-6H7.99a1 1 0 0 1 0-2H14V5h-3V3H9v2H8a3 3 0 1 0 0 6h4a1 1 0 1 1 0 2H6v2h3v2h2v-2z" />
                                        </svg>
                                    </div>
                                    <div class="input-group-text border-0 bg-white">
                                        <input type="text" class="form-control border-0 text-muted" name="jumlah_angsuran" id="jumlah_angsuran" value="Rp{{number_format($loan-> jumlah_angsuran,2)}}" required>
                                        <input type="hidden" name="jumlah_angsuran" class="form-control" value="{{$loan->jumlah_angsuran}}">
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-2 mt-3 shadow-sm">
                                <div class="input-group-prepend">
                                    <div class="input-group-text border-0 bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20">
                                            <path fill="#eeeeee"
                                                d="M15 2h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4c0-1.1.9-2 2-2h2V0h2v2h6V0h2v2zM3 6v12h14V6H3zm6 5V9h2v2h2v2h-2v2H9v-2H7v-2h2z" />
                                        </svg>
                                    </div>
                                    <div class="input-group-text border-0 bg-white">
                                        <input type="number" class="form-control border-0 text-muted" name="angsuran_ke" id="angsuran_ke" value="{{$angsuran_ke}}" placeholder="angsuran_ke" required>
                                        <input type="hidden" name="jumlah_angsuran" class="form-control" value="{{$angsuran_ke}}">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="d-flex justify-content-center pt-3 mb-3">
                                <button type="submit" class="btn btn-white mr-3 shadow-sm">
                                    {{_('Masukkan angsuran')}}
                                </button>
                                <a href="{{route('installments.index')}}" class="btn btn-warning shadow-sm">
                                    {{_('Cancel')}}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
