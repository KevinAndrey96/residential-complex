@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card">
                    <div class="card-header">
                        <h3 class="p-2 text-center">{{ __('Cambiar contraseña') }}</h3>
                    </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="form-group col-md-8 text-center">
                                <label for="email">
                                    {{ __('Correo electrónico') }}
                                </label>
                                <div class="col-md-12 text-center">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-12 mb-0 text-center">
                                <div class=" ">
                                    <button type="submit" style="border-radius: 25px;" class="btn btn-primary btn-round">
                                        {{ __('Recuperar contraseña') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
