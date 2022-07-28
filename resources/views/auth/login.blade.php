@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow border-0">
                <div class="card-body rounded-lg">
                    <p class="text-muted text-center pt-3 mb-5" >
                        Login dengan akun
                    </p>
                    <form action="{{ route('login') }}" method="POST" >
                        @csrf
                        <div class="input-group mb-4 shadow-sm">
                            <div class="input-group-text border-0 bg-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M12 12.713l-11.985-9.713h23.971l-11.986 9.713zm-5.425-1.822l-6.575-5.329v12.501l6.575-7.172zm10.85 0l6.575 7.172v-12.501l-6.575 5.329zm-1.557 1.261l-3.868 3.135-3.868-3.135-8.11 8.848h23.956l-8.11-8.848z"/>
                                </svg>
                            </div>
                            <input type="email" name="email" id="email" class="form-control border-0 text-muted
                            {{$errors-> has('email') ? ' is-invalid ' : '' }}"
                            value="{{ old('email') }}"
                            placeholder="Email" required autofocus
                                >
                                @if ($errors-> has('email'))
                               <span class="invalid-feedback" role="alert">
                                <strong>{{$errors-> first('email')}}</strong>
                               </span>
                               @endif
                        </div>
                        <div class="input-group mb-2 mt-3 shadow-sm">
                            <div class="input-group-text border-0 bg-white" >
                                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12.804 9c1.038-1.793 2.977-3 5.196-3 3.311 0 6 2.689 6 6s-2.689 6-6 6c-2.219 0-4.158-1.207-5.196-3h-3.804l-1.506-1.503-1.494 1.503-1.48-1.503-1.52 1.503-3-3.032 2.53-2.968h10.274zm7.696 1.5c.828 0 1.5.672 1.5 1.5s-.672 1.5-1.5 1.5-1.5-.672-1.5-1.5.672-1.5 1.5-1.5z"/></svg>
                            </div>
                            <input type="password" name="password" id="password" class="form-control border-0 text-muted
                               {{$errors-> has('password') ? 'is-invalid' : '' }}"
                               value="{{ old('password') }}"
                               placeholder="Password" required autofocus
                               >
                               @if ($errors-> has('password'))
                               <span class="invalid-feedback" role="alert">
                                <strong>{{$error-> first('password')}}</strong>
                               </span>
                               @endif
                        </div>

                        <div class="form-group row pt-3">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input shadow-sm" type="checkbox" name="remember" id="remember" {{old ('remember') ? 'checked' : '' }} >
                                    <label class="form-check-label" for="remember" {{ _ ('Remember Me') }}>Ingat Saya</label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center pt-3 mb-3">
                            <button type="submit" class="btn btn-primary shadow-sm">
                                {{_('Sign In')}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
