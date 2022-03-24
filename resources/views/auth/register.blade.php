@extends('templates.main')
@section('content')
<div class="container mt-5 mp-5" style="padding-bottom: 55px;">
    <div class = "white_block">
        <div>
            <img class="imgLogin" src="{{ asset('images/photo.jpg') }}" />
        </div>
        <div class="formRegisterLogin">
            <h1>Register Page</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" name="username"  placeholder="Enter username">
                    @error('username')
                    <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" class="form-control" name="phone"  placeholder="Enter phone">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">City</label>
                    <input type="text" class="form-control" name="city" placeholder="Enter city">
                    @error('city')
                    <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
                    @enderror
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                </div>
            </form>

        </div>
    </div></div>
@endsection
