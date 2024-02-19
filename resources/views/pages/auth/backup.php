@extends('layout.auth')

@section('title', 'Login')

@push('css')
<style>
    .form-control-user {
        border-radius: 5px !important;
    }
</style>
@endpush
@section('content')
<div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
            <div class="text-center">
                <h5 class="text-gray-900 mb-5">SPK - Penilaian Status Gizi Balita<br></h5>
            </div>
            @if (session('message'))
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-danger">{{ session('message') }}</div>
                </div>
            </div>
            @endif
            <form class="user" action="{{ route('login.process') }}" method="post">
                @csrf
                <div class="form-outline mb-4">
                    <input type="text" name="username" id="form1Example13" class="form-control form-control-lg" />
                    <label class="form-label" for="form1Example13">Username</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" name="password" id="form1Example23" class="form-control form-control-lg" />
                    <label class="form-label" for="form1Example23">Password</label>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>
@section('content')