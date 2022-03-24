@extends('templates.main')

@section('content')
    <div class="container" style ="padding-bottom: 35px;">
    <div class="container mt-5 mp-5">
        <div class = "white_block">
            <div>
                <img class="imgRegiserLogin" src="{{ asset('images/photo.jpg') }}" />
            </div>
            <div class="formRegisterLogin">
                <h1>Login Page</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        @error('email')
                        <span class="invalid-feedback is-invalid" role="alert">
            <strong>{{$message}}</strong>
        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary">Submit</button>
                    </div>
                </form>
                <a href="/register">Aren't registered yet? Click here</a>
            </div>
        </div></div></div>
@endsection
