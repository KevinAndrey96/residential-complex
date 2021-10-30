@extends('layouts.dashboard')
@section('content')

    @if(Session::has('extraSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('extraSuccess') }}
        </div>

    @endif

@endsection
